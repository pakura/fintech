<?php

namespace App\Http\Controllers\Admin;

use Models\Menu;
use Illuminate\Http\Request;
use App\Support\Admin\AdminDestroy;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuRequest;

class AdminMenusController extends Controller
{
    /**
     * The Menu instance.
     *
     * @var \Models\Menu
     */
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Menu  $model
     * @return void
     */
    public function __construct(Menu $model)
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
        return view('admin.menus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['current'] = $this->model;

        return view('admin.menus.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\MenuRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MenuRequest $request)
    {
        $model = $this->model->create($request->all());

        return redirect(cms_route('menus.edit', [$model->id]))
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

        return view('admin.menus.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\MenuRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(MenuRequest $request, $id)
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

    /**
     * Set the specified menu to main.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function setMain(Request $request)
    {
        if ($request->has('id')) {
            $id = (int) $request->get('id');

            $this->model->where('main', 1)->update(['main' => 0]);

            return response()->json(
                $this->model->findOrFail($id)->update(['main' => 1])
            );
        }

        return response(trans('general.invalid_input'), 422);
    }
}
