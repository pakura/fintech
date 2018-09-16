<?php

namespace App\Http\Controllers\Admin;

use Models\Collection;
use Illuminate\Http\Request;
use App\Support\Admin\AdminDestroy;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CollectionRequest;

class AdminCollectionsController extends Controller
{
    /**
     * The Collection instance.
     *
     * @var \Models\Collection
     */
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Collection  $model
     * @return void
     */
    public function __construct(Collection $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['items'] = $this->model->get();

        return view('admin.collections.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $data['current'] = $this->model;
        $data['current']->type = $request->get('type');
        $data['current']->admin_per_page = 20;
        $data['current']->web_per_page = 10;

        return view('admin.collections.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\CollectionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CollectionRequest $request)
    {
        $model = $this->model->create($request->all());

        return redirect(cms_route('collections.edit', [$model->id]))
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
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['current'] = $this->model->findOrFail($id);

        return view('admin.collections.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\CollectionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(CollectionRequest $request, $id)
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
     * @param  int  $id
     * @return mixed
     */
    public function destroy($id)
    {
        return (new AdminDestroy($this->model, $id, false))->handle();
    }
}
