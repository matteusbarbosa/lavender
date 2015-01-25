<?php
namespace Lavender\Cart\Composers;

use Illuminate\Support\Facades\App;

class ItemsComposer
{

    public function compose($view)
    {
        $cart = App::make('cart');

        //$cart = clone $cart;

        $view->with('items', $cart->items);
    }

}