<?php
namespace Lavender\Cart\Handlers;


class UnloadCart
{
    public function handle($account)
    {
        // if account login is a customer
        if($account->getEntity() == 'customer'){

            // unload session cart
            app('cart')->unsetCart();
        }
    }

}