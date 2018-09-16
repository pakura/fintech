<?php

namespace App\Http\Controllers\Admin;

use Models\Gallery;
use Models\Collection;
use Illuminate\Http\Request;
use App\Support\Admin\AdminDestroy;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;

class AdminGalleriesController extends Controller
{
    use PositionableTrait, VisibilityTrait, MovableTrait;

    /**
     * The Gallery instance.
     *
     * @var \Models\Gallery
     */
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Gallery  $model
     * @return void
     */
    public function __construct(Gallery $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $collectionId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($collectionId)
    {
        $data['parent'] = (new Collection)->where('type', Gallery::TYPE)
            ->findOrFail($collectionId);

        $data['items'] = $this->model->getAdminCollection($data['parent']);

        $data['parentSimilar'] = $this->model->byType()->get();

        return view('admin.galleries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $collectionId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request, $collectionId)
    {
        $data['current'] = $this->model;
        $data['current']->collection_id = $collectionId;
        $data['current']->type = $request->get('type');
        $data['current']->admin_per_page = 20;
        $data['current']->web_per_page = 10;

        return view('admin.galleries.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\GalleryRequest  $request
     * @param  int  $collectionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GalleryRequest $request, $collectionId)
    {
        $input = $request->all();
        $input['collection_id'] = $collectionId;

        $model = $this->model->create($input);

        return redirect(cms_route('galleries.edit', [$collectionId, $model->id]))
            ->with('alert', fill_data('success', trans('general.created')));
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
     * @param  int  $collectionId
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($collectionId, $id)
    {
        $data['items'] = $this->model->joinLanguage(false)
            ->where('id', $id)
            ->getOrFail();

        return view('admin.galleries.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\GalleryRequest  $request
     * @param  int  $collectionId
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(GalleryRequest $request, $collectionId, $id)
    {
        $this->model->findOrFail($id)->update($input = $request->all());

        if ($request->expectsJson()) {
            return response()->json(fill_data(
                'success', trans('general.updated'), $input
            ));
        }

        return redirect()->back()->with('alert', fill_data(
            'success', trans('general.updated')
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $collectionId
     * @param  int  $id
     * @return mixed
     */
    public function destroy($collectionId, $id)
    {
        return (new AdminDestroy($this->model, $id, false))->handle();
    }
}
