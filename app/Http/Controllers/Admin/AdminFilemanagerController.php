<?php

/*
|--------------------------------------------------------------------------
| File manager
|--------------------------------------------------------------------------
|
| To cache the route, we'll use controller instead of closure.
|
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminFilemanagerController extends Controller
{
    /**
     * Display a file manager.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.filemanager.filemanager');
    }
}
