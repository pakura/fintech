<?php

namespace App\Http\Controllers\Admin;

use Models\Translation;
use Illuminate\Http\Request;
use App\Support\Admin\AdminDestroy;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TranslationRequest;

class AdminTranslationsController extends Controller
{
    /**
     * The Translation instance.
     *
     * @var \Models\Translation
     */
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Translation  $model
     * @return void
     */
    public function __construct(Translation $model)
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
        $data['items'] = $this->model->joinLanguage()->get();

        return view('admin.translations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['current'] = $this->model;

        $data['transTypes'] = (array) config('cms.trans_types');

        return view('admin.translations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\TranslationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TranslationRequest $request)
    {
        $model = $this->model->create($request->all());

        return redirect(cms_route('translations.edit', [$model->id]))
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
        $data['items'] = $this->model->joinLanguage(false)
            ->where('id', $id)
            ->getOrFail();

        $data['transTypes'] = (array) config('cms.trans_types');

        return view('admin.translations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\TranslationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(TranslationRequest $request, $id)
    {
        $input = $request->all();
        unset($input['name']);

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
     * @param  int  $id
     * @return mixed
     */
    public function destroy($id)
    {
        return (new AdminDestroy($this->model, $id, false))->handle();
    }

    /**
     * Get the translation modal form by speicific name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getModal(Request $request)
    {
        if (! ($name = $request->get('name'))) {
            return response('Invalid name.', 422);
        }

        $data['items'] = $this->model->where('name', $name)
            ->joinLanguage(false)
            ->get();

        if ($data['items']->isEmpty()) {
            $data['current'] = $this->model;
            $data['current']->name = $name;

            $form = 'create';
        } else {
            $form = 'edit';
        }

        $data['transTypes'] = (array) config('cms.trans_types');

        return view('admin.translations.modal.' . $form, $data);
    }

    /**
     * Create/Update a translation model.
     *
     * @param  \App\Http\Requests\Admin\TranslationRequest  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postModal(TranslationRequest $request)
    {
        $input = $request->only('id', 'name', 'title', 'value', 'type');

        if (is_null($input['id'])) {
            unset($input['id']);

            $this->model->create($input);
        } else {
            unset($input['name']);

            $model = $this->model->findOrFail($input['id']);

            $model->update($input);

            $input['name'] = $model->name;
        }

        return response()->json($input);
    }
}
