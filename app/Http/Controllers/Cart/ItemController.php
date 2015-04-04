<?php
namespace App\Http\Controllers\Cart;

use App\Http\Controller\Frontend;
use Illuminate\Http\Request;

class ItemController extends Frontend
{

    public function postAdd(Request $request)
    {
        form('cart_item_add')->handle($request);

        return redirect('cart');
    }

    public function postUpdate(Request $request)
    {
        form('cart_item_update')->handle($request);

        return redirect('cart');
    }

}
