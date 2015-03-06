<?php
namespace App\Http\Controllers\Checkout;

use App\Http\Controller\Frontend;

class IndexController extends Frontend
{

    public function __construct()
    {
        $this->loadLayout();
    }

    public function getIndex()
    {
        return redirect('checkout/shipping');
    }
}
