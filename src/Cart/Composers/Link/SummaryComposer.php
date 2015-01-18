<?php
namespace Lavender\Cart\Composers\Link;

use Illuminate\Support\Facades\App;

class SummaryComposer
{

    public function compose($view)
    {
        $cart_summary = App::make('cart')->getSummary();

        $view->with('url', 'cart');

        $view->with('label', sprintf("Shopping Cart (%s)", $cart_summary));
    }

}