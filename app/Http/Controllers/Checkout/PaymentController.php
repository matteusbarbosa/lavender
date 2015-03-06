<?php
namespace App\Http\Controllers\Checkout;

use App\Http\Controller\Frontend;
use Illuminate\Http\Request;

class PaymentController extends Frontend
{

    public function __construct()
    {
        $this->loadLayout();

        $this->middleware('checkout_payment');
    }

    public function getIndex()
    {
        //todo shipping middleware
        return view('checkout.page');
    }

    public function postIndex(Request $request)
    {
        //todo shipping middleware
        workflow('checkout')->handle($request->all());

        return redirect('checkout/review');
    }
}
