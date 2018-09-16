<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\CouponsRequest;
use App\Http\Requests\Request;
use Models\Codes;
use Models\Collection;
use App\Support\Admin\AdminDestroy;
use App\Http\Controllers\Controller;

class AdminCouponsCodesController extends Controller
{
    use PositionableTrait, VisibilityTrait, MovableTrait;

    /**
     * The Coupons instance.
     *
     * @var \Models\Codes
     */
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Codes  $model
     * @return void
     */
    public function __construct(Codes $model)
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
        $data['parent'] = (new Collection)->where('type', Codes::TYPE)
            ->findOrFail($collectionId);
        $data['items'] = $this->model->filesCount()->orderBy('status', 'desc')->getAdminCollection($data['parent']);

        $data['parentSimilar'] = $this->model->byType()->get();

        return view('admin.codes.index', $data);
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
        return view('admin.codes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $collectionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CouponsRequest $request, $collectionId)
    {
        $input = $request->all();
        $input['collection_id'] = $collectionId;

        $model = $this->model->create($input);

        return redirect(cms_route('codes.edit', [$collectionId, $model->id]))
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


        return view('admin.codes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\CouponsRequest  $request
     * @param  int  $collectionId
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(CouponsRequest $request, $collectionId, $id)
    {
        $currentCodes = $this->model->where('id', $id)->first();
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
        return (new AdminDestroy($this->model, $id))->handle();
    }
}
