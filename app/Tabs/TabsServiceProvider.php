<?php
namespace Lavender\Tabs;

use Illuminate\Support\ServiceProvider;

class TabsServiceProvider extends ServiceProvider
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
            'tabbed.content',
        ];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerTabbedContent();
    }


    private function registerTabbedContent()
    {
        $this->app->bindShared('tabbed.content', function ($app){

            return new Services\TabbedContent();

        });
    }

}

