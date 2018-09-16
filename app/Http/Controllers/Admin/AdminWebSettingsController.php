<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class AdminWebSettingsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['webSettings'] = DB::table('web_settings')->first();

        return view('admin.web_settings.index', $data);
    }

    /**
     * Update the "web_settings" table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $columns = array_flip(Schema::getColumnListing('web_settings'));
        unset($columns['id']);

        $attributes = $request->all();

        $attributes = array_intersect_key($attributes, $columns);

        DB::table('web_settings')->update($attributes);

        return redirect(cms_route('webSettings.index'))
            ->with('alert', fill_data('success', trans('general.updated')));
    }
}
