<?php

namespace Lavender\Core;

use Lavender\Core\Database\Query\Builder as Schema;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lavender/core');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('schema', function(){
            return new Schema();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}