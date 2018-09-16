<?php

namespace App\Http\Controllers\Web;

use Models\Faq;
use Models\Page;
use Models\Collection;
use App\Http\Controllers\Controller;

class WebFaqController extends Controller
{
    /**
     * The Faq instance.
     *
     * @var \Models\Faq
     */
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Faq  $model
     * @return void
     */
    public function __construct(Faq $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Models\Page  $page
     * @param  \Models\Collection  $collection
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Page $page, Collection $collection)
    {
        $data['current'] = $page;

        $data['items'] = $this->model->getPublicCollection($collection);

        return view('web.faq', $data);
    }

    /**
     * The specified resource is not available.
     *
     * @return void
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function show()
    {
        abort(404);
    }
}
