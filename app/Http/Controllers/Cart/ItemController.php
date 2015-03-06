<?php
namespace App\Http\Controllers\Cart;

use App\Http\Controller\Frontend;
use Illuminate\Http\Request;

class ItemController extends Frontend
{

    public function __construct()
    {
        $this->loadLayout();
    }

    public function postAdd(Request $request)
    {
        workflow('cart_item_add')->handle($request->all());

        return redirect('cart');
    }

    public function postUpdate(Request $request)
    {
        workflow('cart_item_update')->handle($request->all());

        return redirect('cart');
    }

}
