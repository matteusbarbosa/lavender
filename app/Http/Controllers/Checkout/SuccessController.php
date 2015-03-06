<?php
namespace App\Http\Controllers\Checkout;

use App\Http\Controller\Frontend;

class SuccessController extends Frontend
{

    public function __construct()
    {
        $this->loadLayout();

        $this->middleware('checkout_success');
    }

    public function getIndex()
    {
        return view('checkout.success');
    }

}
