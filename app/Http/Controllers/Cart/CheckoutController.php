<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;

class CheckoutController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();

        // Cart is not empty
        $this->middleware('cart');

        // Cart is ready to ship and paid in full
        $this->middleware('checkout');
	}

	public function getIndex(Cart $cart)
	{
        append_section(
            'cart.items',
            view('cart.partials.items')->withItems($cart->getItems())
        );

		return view('cart.page')->withTotals(['Total' => $cart->getTotal()]);
	}

}
