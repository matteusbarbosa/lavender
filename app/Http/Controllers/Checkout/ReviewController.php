<?php
namespace App\Http\Controllers\Checkout;

use App\Http\Controller\Frontend;
use Illuminate\Http\Request;

class ReviewController extends Frontend
{

    public function __construct()
    {
        $this->loadLayout();

        $this->middleware('checkout_review');
    }

    public function getIndex()
    {
        //todo shipping + payment middleware
        return view('checkout.page');
    }

    public function postIndex(Request $request)
    {
        //todo shipping + payment middleware
        workflow('checkout')->handle($request);

        //todo get order
        $order = new \stdClass();
        $order->id = 1;

        return redirect('checkout/success')->with('order', $order);
    }
}
