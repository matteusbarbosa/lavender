<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;

class ShipmentController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();

        $this->middleware('cart');
	}

	public function getIndex(Cart $cart)
	{
        return view('cart.shipment');
	}
}
