<?php
namespace Lavender\Cart\Handlers;


class ReloadCart
{

    /**
     * Todo move functionality to consumer class
     * @param $account
     * @param $remember
     */
    public function handle($account, $remember)
    {

        try{
            // if account login is a customer
            if($account->getEntity() == 'customer'){

                // load session cart
                $session_cart = app('cart');

                // load customer cart
                if($customer_cart = $account->getCart()){

                    // if cart ids don't match, we must merge their contents
                    if($customer_cart->id != $session_cart->id){

                        // todo merge session_cart into customer_cart
                        \Message::addError("todo: merge session_cart into customer_cart");

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

}