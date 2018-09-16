<?php

namespace App\Providers;

use League\Glide\Server;
use League\Glide\ServerFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Filesystem\Filesystem;

class GlideServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Server::class, function ($app) {
            $filesystem = $app[Filesystem::class];

            $source = (array) $app['config']->get('elfinder.public');
            $source = key($source);

            return (new ServerFactory([
                'source'                 => public_path($source),
                'cache'                  => $filesystem->getDriver(),
                'cache_path_prefix'      => 'images/cache',
                'group_cache_in_folders' => false
            ]))->getServer();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Server::class];
    }
}
