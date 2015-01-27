<?php
namespace Lavender\Menu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'menu.builder',
        ];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMenuBuilder();
    }


    private function registerMenuBuilder()
    {
        $this->app->bindShared('menu.builder', function ($app){

            return new Services\MenuBuilder;

        });
    }

}

