<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;

class CartController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();

        $this->middleware('cart', ['except' => 'getEmpty']);
	}

	public function getIndex(Cart $cart)
	{
        /** @var \App\Database\Cart $model */
        $model = $cart->getCart();

        append_section(
            'cart.items',
            view('cart.items')
                ->withItems($model->items)
        );

		return view('cart.page')
            ->withTotals(['Total' => $cart->getTotal()]);
	}

	public function getEmpty()
	{
		return view('cart.empty');
	}

}
