<?php
namespace Lavender\Cart;

use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;
use Lavender\Cart\Database\Cart;

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

        $this->app->booted(function (){

            $this->bootCurrentCart();

        });
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCart();
        $this->registerListeners();
    }

    private function registerListeners()
    {
        $this->app->events->listen(
            'workflow.add_to_cart.add.after',
            'Lavender\Cart\Handlers\AddToCart@handle'
        );
    }

    private function registerCart()
    {
        $this->app->bindShared('cart', function($app){
            return new Cart;
        });
    }

    /**
     * Match user session to initialize $theme
     *
     * @throws \Exception
     * @return void
     */
    private function bootCurrentCart()
    {
        try{
            // Find or create the current cart session
            $cart = $this->app->cart->find('session');

            // Register the current cart object
            $this->app->cart->booting($cart);

            $this->app->cart = $cart;

        } catch(QueryException $e){

            // missing core tables
            if(!\App::runningInConsole()) throw new \Exception("Lavender not installed.");
        } catch(\Exception $e){

            // something went wrong
            if(!\App::runningInConsole()) throw new \Exception($e->getMessage());
        }
    }
}