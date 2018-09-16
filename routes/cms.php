<?php

/*
|--------------------------------------------------------------------------
| CMS Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application CMS.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->group(['middleware' => 'cms.data', 'prefix' => cms_slug()], function ($router) {
    // authentication
    $router->group(['namespace' => 'Auth'], function ($router) {
        // login
        $router->get('login', ['as' => 'login', 'uses' => 'AdminLoginController@showLoginForm']);
        $router->post('login', ['as' => 'login', 'uses' => 'AdminLoginController@login']);
        $router->post('logout', ['as' => 'logout', 'uses' => 'AdminLoginController@logout']);

        // lockscreen
        $router->group(['middleware' => ['cms.lockscreen']], function ($router) {
            $router->get('lockscreen', ['as' => 'lockscreen', 'uses' => 'AdminLoginController@getLockscreen']);
            $router->post('lockscreen', [
                'middleware' => 'throttle:3,2', 'as' => 'lockscreen', 'uses' => 'AdminLoginController@postLockscreen'
            ]);
            $router->put('lockscreen', ['as' => 'lockscreen', 'uses' => 'AdminLoginController@setLockscreen']);
        });
    });

    // CMS
    $router->group(['middleware' => ['cms.auth'], 'namespace' => 'Admin'], function ($router) {
        // dashboard
        $router->get('/', ['as' => 'dashboard', 'uses' => 'AdminDashboardController@index']);

        // menus
        $router->post('menus/set-main', ['as' => 'menus.setMain', 'uses' => 'AdminMenusController@setMain']);
        $router->resource('menus', 'AdminMenusController', ['names' => resource_names('menus'),
            'except' => ['show']
        ]);

        // pages
        $router->post('pages/{id}/visibility', ['as' => 'pages.visibility', 'uses' => 'AdminPagesController@visibility']);
        $router->put('pages/position', ['as' => 'pages.updatePosition', 'uses' => 'AdminPagesController@updatePosition']);
        $router->get('pages/templates', ['as' => 'pages.templates', 'uses' => 'AdminPagesController@getTemplates']);
        $router->get('pages/attached-types', ['as' => 'pages.attachedTypes', 'uses' => 'AdminPagesController@getAttachedTypes']);
        $router->put('pages/move/{menuId}', ['as' => 'pages.move', 'uses' => 'AdminPagesController@move']);
        $router->put('pages/collapse', ['as' => 'pages.collapse', 'uses' => 'AdminPagesController@collapse']);
        $router->resource('menus.pages', 'AdminPagesController', ['names' => resource_names('pages'),
            'except' => ['show']
        ]);

        // collections
        $router->resource('collections', 'AdminCollectionsController', ['names' => resource_names('collections'),
            'except' => ['show']
        ]);
        // routes from config
        foreach ((array) $this->app['config']->get('cms.routes') as $prefix => $routes) {
            foreach ((array) $routes as $route => $controller) {
                $router->post($route . '/{id}/visibility', [
                    'as' => $route . '.visibility',
                    'uses' => $controller . '@visibility'
                ]);
                $router->put($route . '/position', [
                    'as' => $route . '.updatePosition',
                    'uses' => $controller . '@updatePosition'
                ]);
                $router->put($route . '/move/{id}', [
                    'as' => $route . '.move',
                    'uses' => $controller . '@move'
                ]);
                $router->resource($prefix . '.' . $route, $controller, ['names' => resource_names($route),
                    'except' => ['show']
                ]);
            }
        }

        // permissions
        $router->get('permissions', ['as' => 'permissions.index', 'uses' => 'AdminPermissionsController@index']);
        $router->post('permissions', ['as' => 'permissions.store', 'uses' => 'AdminPermissionsController@store']);

        // cms users
        $router->resource('cms-users', 'AdminCmsUsersController', ['names' => resource_names('cmsUsers')]);

        // file manager
        $router->get('filemanager', ['as' => 'filemanager', 'uses' => 'AdminFilemanagerController@index']);

        // files
        $router->post('files/{id}/visibility', ['as' => 'files.visibility', 'uses' => 'AdminFilesController@visibility']);
        $router->put('files/position', ['as' => 'files.updatePosition', 'uses' => 'AdminFilesController@updatePosition']);
        $router->resource('{routeName}/{routeId}/files', 'AdminFilesController', ['names' => resource_names('files'),
            'except' => ['show']
        ]);

        // slider
        $router->post('slider/{id}/visibility', ['as' => 'slider.visibility', 'uses' => 'AdminSliderController@visibility']);
        $router->put('slider/position', ['as' => 'slider.updatePosition', 'uses' => 'AdminSliderController@updatePosition']);
        $router->resource('slider', 'AdminSliderController', ['names' => resource_names('slider'),
            'except' => ['show']
        ]);

        // translations
        $router->get('translations/form', ['as' => 'translations.popup', 'uses' => 'AdminTranslationsController@getModal']);
        $router->post('translations/form', ['as' => 'translations.popup', 'uses' => 'AdminTranslationsController@postModal']);
        $router->resource('translations', 'AdminTranslationsController', ['names' => resource_names('translations'),
            'except' => ['show']
        ]);

        // notes
        $router->get('notes', ['as' => 'notes.index', 'uses' => 'AdminNotesController@index']);
        $router->put('notes', ['as' => 'notes.save', 'uses' => 'AdminNotesController@save']);
        $router->post('notes', ['as' => 'notes.destroy', 'uses' => 'AdminNotesController@destroy']);
        $router->post('notes-calendar', ['as' => 'notes.calendar', 'uses' => 'AdminNotesController@calendar']);

        // calendar
        $router->get('calendar', ['as' => 'calendar.index', 'uses' => 'AdminCalendarController@index']);
        $router->post('calendar/events', ['as' => 'calendar.events', 'uses' => 'AdminCalendarController@events']);
        $router->put('calendar', ['as' => 'calendar.save', 'uses' => 'AdminCalendarController@save']);
        $router->post('calendar', ['as' => 'calendar.destroy', 'uses' => 'AdminCalendarController@destroy']);

        // settings
        $router->get('settings', ['as' => 'settings.index', 'uses' => 'AdminSettingsController@index']);
        $router->put('settings', ['as' => 'settings.update', 'uses' => 'AdminSettingsController@update']);
        $router->get('web-settings', ['as' => 'webSettings.index', 'uses' => 'AdminWebSettingsController@index']);
        $router->put('web-settings', ['as' => 'webSettings.update', 'uses' => 'AdminWebSettingsController@update']);

        // sitemap xml
        $router->get('sitemap/xml/store', ['as' => 'sitemap.xml.store', 'uses' => 'AdminSitemapXmlController@store']);

        // bug report
        $router->get('bug-report', ['as' => 'bugReport.index', 'uses' => 'AdminBugReportController@index']);
        $router->post('bug-report', ['as' => 'bugReport.send', 'uses' => 'AdminBugReportController@send']);
    });
});
