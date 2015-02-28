<?php
namespace App\Handlers\Events;


use App\Support\Facades\Message;
use Lavender\Contracts\Workflow;

class CartHandler
{

    public function unload($account)
    {
        // if account login is a customer
        if($account->getEntityName() == 'customer'){

            // unload session cart
            app('cart')->unsetCart();
        }
    }

    /**
     * todo move to command
     * @param $account
     */
    public function reload($account)
    {

        try{
            // if account login is a customer
            if($account->getEntityName() == 'customer'){

                // load session cart
                $session_cart = app('cart');

                // load customer cart
                if($customer_cart = $account->getCart()){

                    // if cart ids don't match, we must merge their contents
                    if($customer_cart->id != $session_cart->id){

                        // todo merge session_cart into customer_cart
                        Message::addNotice("todo: merge session_cart into customer_cart");

                        // delete original session cart id
                        entity('cart')->find($session_cart->id)->delete();

                        // assign the cart to global scope
                        $session_cart->setCart($customer_cart);

                    } else {

                        //do nothing

                    }

                } else {

                    // load the current cart
                    $cart = entity('cart')->find($session_cart->id);

                    // assign customer to cart
                    $cart->fill(['customer' => $account]);

                    $cart->save();

                    // assign the cart to global scope
                    $session_cart->setCart($cart);

                }

            }

        } catch(\Exception $e){


            var_dump($e->getMessage());die;


        }
    }


    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'auth.logout',
            'App\Handlers\Events\CartHandler@unload'
        );
        $events->listen(
            'auth.login',
            'App\Handlers\Events\CartHandler@reload'
        );
    }

}