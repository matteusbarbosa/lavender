<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;
use Illuminate\Http\Request;
use Lavender\Support\Facades\Message;

class CheckoutController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();
	}

	public function getIndex()
	{
        return view('cart.review');
	}


    public function postIndex(Request $request, Cart $cart)
    {
        if(!workflow('cart_review')->handle($request)){

            return redirect('checkout');

        }

        Message::addSuccess('Order #'.$cart->id.' has been received!');

        return redirect('cart/success');
    }
}
