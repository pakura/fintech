<?php

namespace App\Http\Controllers\Admin;

use Models\Slider;
use Illuminate\Http\Request;
use App\Support\Admin\AdminDestroy;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;

class AdminSliderController extends Controller
{
    use PositionableTrait, VisibilityTrait;

    /**
     * The Slider instance.
     *
     * @var \Models\Slider
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
     * @param  \Models\Slider  $model
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Slider $model, Request $request)
    {
        $this->model = $model;

        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['items'] = $this->model->forAdmin()->get();

        return view('admin.slider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create()
    {
        if ($this->request->expectsJson()) {
            $data['current'] = $this->model;

            $view = view('admin.slider.create', $data)->render();

            return response()->json(['result' => true, 'view' => $view]);
        }

        return redirect(cms_route('slider.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\SliderRequest  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SliderRequest $request)
    {
        $model = $this->model->create($input = $request->all());

        if ($request->expectsJson()) {
            $view = view('admin.slider.item', [
                'item' => $model,
                'itemInput' => $input
            ])->render();

            return response()->json(
                fill_data('success', trans('general.created'))
                + ['view' => preg_replace('/\s+/', ' ', trim($view))]
            );
        }

        return redirect(cms_route('slider.index'));
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
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        if ($this->request->expectsJson()) {
            $data['items'] = $this->model->joinLanguage(false)
                ->where('id', $id)
                ->getOrFail();

            $view = view('admin.slider.edit', $data)->render();

            return response()->json(['result' => true, 'view' => $view]);
        }

        return redirect(cms_route('slider.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\SliderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SliderRequest $request, $id)
    {
        $this->model->findOrFail($id)->update($input = $request->all());

        if ($request->expectsJson()) {
            return response()->json(fill_data(
                'success', trans('general.updated'), $input
            ));
        }

        return redirect(cms_route('slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy($id)
    {
        $id = $this->request->get('ids');

        return (new AdminDestroy($this->model, $id, false))->handle();
    }
}
