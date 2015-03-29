<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;
use Illuminate\Http\Request;

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

	public function getIndex()
	{
        return view('cart.review');
	}


    public function postIndex(Request $request)
    {
        if(!workflow('cart_review')->handle($request)){

            return redirect('checkout');

        }

        return redirect('cart/success');
    }
}
