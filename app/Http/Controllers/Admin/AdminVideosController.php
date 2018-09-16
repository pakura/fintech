<?php

namespace App\Http\Controllers\Admin;

use Models\Video;
use Models\Gallery;
use Illuminate\Http\Request;
use App\Support\Admin\AdminDestroy;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;

class AdminVideosController extends Controller
{
    use PositionableTrait, VisibilityTrait;

    /**
     * The Video instance.
     *
     * @var \Models\Video
     */
    protected $model;

    /**
     * The Request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Video  $model
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Video $model, Request $request)
    {
        $this->model = $model;

        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $galleryId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($galleryId)
    {
        $data['parent'] = (new Gallery)->where('type', Video::TYPE)
            ->joinLanguage()
            ->findOrFail($galleryId);

        $data['items'] = $this->model->getAdminGallery($data['parent']);

        $data['parentSimilar'] = $this->model->byType()->get();

        return view('admin.videos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $galleryId
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create($galleryId)
    {
        if ($this->request->expectsJson()) {
            $data['current'] = $this->model;
            $data['current']['gallery_id'] = $galleryId;

            $view = view('admin.videos.create', $data)->render();

            return response()->json(['result' => true, 'view' => $view]);
        }

        return redirect(cms_route('videos.index', [$galleryId]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\VideoRequest  $request
     * @param  int  $galleryId
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(VideoRequest $request, $galleryId)
    {
        $input = $request->all();
        $input['gallery_id'] = $galleryId;

        $model = $this->model->create($input);

        if ($request->expectsJson()) {
            $view = view('admin.videos.item', [
                'item' => $model,
                'itemInput' => $input
            ])->render();

            return response()->json(
                fill_data('success', trans('general.created'))
                + ['view' => preg_replace('/\s+/', ' ', trim($view))]
            );
        }

        return redirect(cms_route('videos.index', [$galleryId]));
    }

    /**
     * Display the specified resource.
     *
     * @return void
     */
    public function show()
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $galleryId
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($galleryId, $id)
    {
        if ($this->request->expectsJson()) {
            $model = $this->model;

            $data['items'] = $model->joinLanguage(false)->where('id', $id)
                ->getOrFail();

            $view = view('admin.videos.edit', $data)->render();

            return response()->json(['result' => true, 'view' => $view]);
        }

        return redirect(cms_route('videos.index', [$galleryId]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\VideoRequest  $request
     * @param  int  $galleryId
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(VideoRequest $request, $galleryId, $id)
    {
        $this->model->findOrFail($id)->update($input = $request->all());

        if ($request->expectsJson()) {
            $input += ['youtube' => get_youtube_embed($request->get('file'))];

            return response()->json(fill_data(
                'success', trans('general.updated'), $input
            ));
        }

        return redirect(cms_route('videos.index', [$galleryId]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $galleryId
     * @param  int  $id
     * @return mixed
     */
    public function destroy($galleryId, $id)
    {
        return (new AdminDestroy(
            $this->model,
            $this->request->get('ids'),
            false)
        )->handle();
    }
}
