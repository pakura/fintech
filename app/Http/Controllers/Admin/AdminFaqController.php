<?php

namespace App\Http\Controllers\Admin;

use Models\Faq;
use Models\Collection;
use Illuminate\Http\Request;
use App\Support\Admin\AdminDestroy;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;

class AdminFaqController extends Controller
{
    use PositionableTrait, VisibilityTrait, MovableTrait;

    /**
     * The Faq instance.
     *
     * @var \Models\Faq
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
     * @param  \Models\Faq  $model
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Faq $model, Request $request)
    {
        $this->model = $model;

        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $collectionId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($collectionId)
    {
        $data['parent'] = (new Collection)->findOrFail($collectionId);

        $data['items'] = $this->model->getAdminCollection($data['parent']);

        $data['parentSimilar'] = $this->model->byType()->get();

        return view('admin.faq.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $collectionId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($collectionId)
    {
        $data['current'] = $this->model;
        $data['current']->collection_id = $collectionId;

        return view('admin.faq.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\FaqRequest  $request
     * @param  int  $collectionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FaqRequest $request, $collectionId)
    {
        $input = $request->all();
        $input['collection_id'] = $collectionId;

        $model = $this->model->create($input);

        return redirect(cms_route('faq.edit', [$collectionId, $model->id]))
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

        return view('admin.faq.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\FaqRequest  $request
     * @param  int  $collectionId
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(FaqRequest $request, $collectionId, $id)
    {
        $input = $request->all();

        $this->model->findOrFail($id)->update($input);

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
        return (new AdminDestroy($this->model, $id))->handle();
    }
}
