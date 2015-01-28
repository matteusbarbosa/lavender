<?php
namespace Lavender\Cart;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Lavender\Support\Facades\Workflow;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cart'];
    }


    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lavender/cart', 'cart', realpath(__DIR__));
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booted(function(){

            $this->registerCart();

            $this->registerListeners();

            $this->registerRoutes();

        });
    }

    private function registerRoutes()
    {
        Route::post('cart/post/{workflow}/{state}', function ($workflow, $state){

            return Workflow::make($workflow)->post($state, Input::all());

        });
    }

    private function registerListeners()
    {
        $this->app->events->listen(
            'auth.logout',
            'Lavender\Cart\Handlers\UnloadCart@handle'
        );
        $this->app->events->listen(
            'auth.login',
            'Lavender\Cart\Handlers\ReloadCart@handle'
        );
        $this->app->events->listen(
            'workflow.add_to_cart.add.after',
            'Lavender\Cart\Handlers\AddToCart@handle'
        );
    }

    private function registerCart()
    {
        $this->app->bindShared('cart', function($app){
            return new Shared\Cart();
        });
    }

}