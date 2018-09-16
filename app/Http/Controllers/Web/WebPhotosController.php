<?php

namespace App\Http\Controllers\Web;

use Models\Photo;
use Models\Gallery;
use App\Http\Controllers\Controller;

class WebPhotosController extends Controller
{
    /**
     * The Photo instance.
     *
     * @var \Models\Photo
     */
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @param  \Models\Photo  $model
     * @return void
     */
    public function __construct(Photo $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Models\Gallery  $gallery
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Gallery $gallery)
    {
        $data['current'] = $gallery;

        $data['items'] = $this->model->getPublicGallery($gallery);

        return view('web.photos', $data);
    }
}
