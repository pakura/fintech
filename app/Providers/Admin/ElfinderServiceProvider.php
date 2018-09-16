<?php

namespace App\Providers\Admin;

use ReflectionClass;
use Illuminate\Routing\Router;
use Barryvdh\Elfinder\ElfinderServiceProvider as ServiceProvider;

class ElfinderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        // Boot only when running in console or CMS is booted.
        if ($this->app->runningInConsole() || cms_is_booted()) {
            $viewPath = dirname((new ReflectionClass($this))->getParentClass()->getFilename());
            $viewPath .= '/../resources/views';

            $this->loadViewsFrom($viewPath, 'elfinder');
            $this->publishes([
                $viewPath => base_path('resources/views/vendor/elfinder'),
            ], 'views');

            if (! defined('ELFINDER_IMG_PARENT_URL')) {
                define('ELFINDER_IMG_PARENT_URL', $this->app['url']->asset('packages/barryvdh/elfinder'));
            }

            $config = $this->app['config']->get('elfinder.route', []);

            if (isset($config['prefix'])) {
                $config['prefix'] = cms_slug($config['prefix']);
            }

            $config['namespace'] = 'Barryvdh\Elfinder';

            $router->group($config, function($router) {
                $router->get('index', ['as' => 'filemanager.index', 'uses' => 'ElfinderController@showIndex']);
                $router->any('connector', [
                    'as' => 'filemanager.connector',
                    'uses' => '\App\Http\Controllers\ElfinderController@showConnector'
                ]);
                $router->get('popup/{input_id}', ['as' => 'filemanager.popup', 'uses' => 'ElfinderController@showPopup']);
                $router->get('tinymce4', ['as' => 'filemanager.tinymce4', 'uses' => 'ElfinderController@showTinyMCE4']);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }
}
