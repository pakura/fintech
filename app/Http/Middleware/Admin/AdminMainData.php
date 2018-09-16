<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Models\Menu;
use Models\Calendar;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class AdminMainData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->shareSettings();

        $this->shareMenus();

        $this->shareCalendar();

        return $next($request);
    }

    /**
     * Share the cms settings.
     *
     * @return void
     */
    protected function shareSettings()
    {
        $settings = app('db')->table('cms_settings')->where('cms_user_id', Auth::guard('cms')->id())->first();

        if (! is_null($settings)) {
            $settings->body = "$settings->sidebar_direction $settings->layout_boxed $settings->skin_sidebar $settings->skin_user_menu $settings->skin_horizontal";
            $settings->body = preg_replace('/\s+/', ' ', trim($settings->body));
        }

        view()->share(['cmsSettings' => new Collection($settings)]);
    }

    /**
     * Share the menus.
     *
     * @return void
     */
    protected function shareMenus()
    {
        $menus = (new Menu)->get();

        view()->composer([
            'admin._partials.sidebar_menu',
            'admin._partials.horizontal_menu',
            'admin.menus.index',
            'admin.pages.index'
        ], function($view) use ($menus) {
            $view->with('menus', $menus);
        });
    }

    /**
     * Share the calendar.
     *
     * @return void
     */
    protected function shareCalendar()
    {
        $start = date('Y-m-d');
        $end = date('Y-m-d', strtotime('+7 days', strtotime($start)));

        $calendar = (new Calendar)->getActive($start, $end);

        view()->composer([
            'admin._partials.user',
            'admin._partials.horizontal_menu',
            'admin.dashboard.index'
        ], function($view) use ($calendar) {
            $view->with('calendarEvents', $calendar);
        });
    }
}
