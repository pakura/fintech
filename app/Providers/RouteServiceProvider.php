<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Config\Repository as Config;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapApiRoutes($router);

        $this->mapWebRoutes($router);

        $this->app->booted(function ($app) use ($router) {
            $this->filterRoutes($router, $app['config']);
        });

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->middleware('web')
            ->namespace($this->namespace)
            ->group(function ($router) {
                require base_path('routes/web.php');
                require base_path('routes/cms.php');
            });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapApiRoutes(Router $router)
    {
        $router->prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * {@inheritdoc}
     */
    protected function loadCachedRoutes()
    {
        parent::loadCachedRoutes();

        $this->app->booted(function ($app) {
            $this->filterRoutes($app['router'], $app['config']);
        });
    }

    /**
     * Filter all routes by specified language and CMS slug.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @param  \Illuminate\Config\Repository  $config
     * @return void
     */
    protected function filterRoutes(Router $router, Config $config)
    {
        $language = null;

        if ($config->get('language_isset')) {
            $language = $config->get('app.language');
        }

        $cmsSlug = $config->get('cms.slug');

        foreach ($router->getRoutes() as $route) {
            if (! is_null($language)) {
                $route->prefix($language);
            }

            if (str_contains($route->getPrefix(), $cmsSlug)) {
                $route->name('.' . $cmsSlug);
            }
        }
    }
}
