<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class WebHomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('web.home');
    }
}
