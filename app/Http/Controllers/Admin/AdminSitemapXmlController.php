<?php

namespace App\Http\Controllers\Admin;

use DOMDocument;
use Models\Page;
use Models\Abstracts\Model;
use Illuminate\Http\Request;
use Sabre\Xml\Service as XmlService;
use App\Http\Controllers\Controller;

class AdminSitemapXmlController extends Controller
{
    /**
     * XML data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * List of default namespace prefixes.
     *
     * @var array
     */
    protected $namespaceMap = ['http://www.sitemaps.org/schemas/sitemap/0.9' => ''];

    /**
     * xhtml namespace prefix.
     *
     * @var string
     */
    protected $xhtml;

    /**
     * List of the application languages.
     *
     * @var array
     */
    protected $languages = [];

    /**
     * Main language of the application.
     *
     * @var string
     */
    protected $mainLanguage;

    /**
     * Indicates if the application has many languages.
     *
     * @var bool
     */
    protected $hasManyLanguage = false;

    /**
     * List of the attached types.
     *
     * @var array
     */
    protected $attachedTypes = [];

    /**
     * List of the implicit types.
     *
     * @var array
     */
    protected $implicitTypes = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->languages = languages();

        $this->mainLanguage = key($this->languages);

        if ($this->hasManyLanguage = (count($this->languages) > 1)) {
            $this->namespaceMap += [
                $this->xhtml = 'http://www.w3.org/1999/xhtml' => 'xhtml'
            ];
        }

        $this->attachedTypes = cms_pages('attached');

        $this->implicitTypes = cms_pages('implicit');
    }

    /**
     * Store a newly created/update sitemap xml.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $pages = (new Page)->visible()->orderBy('menu_id')->positionAsc()->get();

        foreach ($pages as $page) {
            $value = ['url' => ['loc' => web_url(
                $page->full_slug = $page->fullSlug()->slug, [], $this->hasManyLanguage
                ? $this->mainLanguage
                : null
            )]];

            if ($page->hasLanguage() && $this->hasManyLanguage) {
                foreach ($this->languages as $langKey => $langValue) {
                    $value['url'][] = $this->getLanguageLinks($page, null, $langKey);
                }
            }

            $this->data[] = $value;

            $this->setImplicitModels($page);
        }

        $xml = new XmlService;
        $xml->namespaceMap = $this->namespaceMap;

        $doc = new DOMDocument;
        $doc->loadXML($xml->write("urlset", $this->data));

        $result = $doc->save(public_path('sitemap.xml'));

        if ($request->expectsJson()) {
            return response()->json($result);
        }

        return redirect()->back();
    }

    /**
     * Set an implicit models to the xml data.
     *
     * @param  \Models\Abstracts\Model $page
     * @return void
     */
    protected function setImplicitModels(Model $page)
    {
        if (! in_array($page->type, $this->attachedTypes)
            && ! in_array($page->type, $this->implicitTypes)
        ) {
            return;
        }

        $implicitModel = (new $this->implicitTypes[$page->type])
            ->find($page->type_id);

        if (! is_null($implicitModel)) {
            $model = model_path($implicitModel->type);

            $items = (new $model)->where(
                str_singular($implicitModel->getTable()) . '_id',
                $implicitModel->id
            )->visible()->orderDesc()->get();

            foreach ($items as $implicitItem) {
                if (empty($implicitItem->slug)) {
                    continue;
                }

                $value = ['url' => ['loc' => web_url(
                    [$page->full_slug, $implicitItem->slug], [], $this->hasManyLanguage
                    ? $this->mainLanguage
                    : null
                )]];

                if ($implicitItem->hasLanguage() && $this->hasManyLanguage) {
                    foreach ($this->languages as $langKey => $langValue) {
                        $value['url'][] = $this->getLanguageLinks(
                            $page, $implicitItem->slug, $langKey
                        );
                    }
                }

                $this->data[] = $value;
            }
        }
    }

    /**
     * Get an array of xml language links.
     *
     * @param  \Models\Abstracts\Model $page
     * @param  string|null $slug
     * @param  string $langKey
     * @return array
     */
    protected function getLanguageLinks(Model $page, $slug = null, $langKey)
    {
        return [
            'name' => "{{$this->xhtml}}link",
            'attributes' => [
                'rel' => 'alternate',
                'hreflang' => $langKey,
                'href' => web_url(
                    [$page->full_slug, $slug],
                    [],
                    $langKey
                )
            ]
        ];
    }
}
