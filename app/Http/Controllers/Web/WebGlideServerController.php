<?php

namespace App\Http\Controllers\Web;

use Exception;
use League\Glide\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Config\Repository as Config;

class WebGlideServerController extends Controller
{
    /**
     * The Server instance.
     *
     * @var \League\Glide\Server
     */
    protected $server;

    /**
     * The Request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new controller instance.
     *
     * @param  \League\Glide\Server $server
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(Server $server, Request $request)
    {
        $this->server = $server;

        $this->request = $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Contracts\Config\Repository $config
     * @param  string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function show(Config $config, $path)
    {
        $source = (array) $config['elfinder.public'];
        $source = key($source);

        $fullPath = $source . '/' . $path;

        $settings = $config['web.glide.' . $this->request->get('type')];

        if (! is_array($settings)) {
            return redirect($fullPath);
        }

        try {
            $this->server->outputImage($path, $settings);
        } catch (Exception $e) {
            return $this->getDefaultPhotoResponse($fullPath);
        }
    }

    /**
     * Get the default photo response.
     *
     * @param  string $path
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    protected function getDefaultPhotoResponse($path)
    {
        try {
            return response()->file(public_path($path));
        } catch (Exception $e) {
            abort(404);
        }
    }
}
