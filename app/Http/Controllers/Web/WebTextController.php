<?php

namespace App\Http\Controllers\Web;

use Models\Page;
use App\Http\Controllers\Controller;

class WebTextController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Models\Page  $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Page $page)
    {
        $data['current'] = $page;

        $data['files'] = $page->getFiles();

        return view('web.text', $data);
    }
}
