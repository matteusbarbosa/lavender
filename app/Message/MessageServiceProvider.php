<?php
namespace Lavender\Message;

use Illuminate\Support\ServiceProvider;

class MessageServiceProvider extends ServiceProvider
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
            'message.service',
        ];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMessageBag();
    }


    private function registerMessageBag()
    {
        $this->app->bindShared('message.service', function ($app){

            return new Services\MessageBag;

        });
    }

}

