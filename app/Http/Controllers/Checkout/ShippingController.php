<?php
namespace App\Http\Controllers\Checkout;

use App\Http\Controller\Frontend;
use Illuminate\Http\Request;

class ShippingController extends Frontend
{

    public function __construct()
    {
        $this->loadLayout();

        $this->middleware('checkout_shipping');
    }

    public function getIndex()
    {
        return view('checkout.page');
    }

    public function postIndex(Request $request)
    {
        workflow('checkout')->handle($request->all());

        return redirect('checkout/payment');
    }
}
