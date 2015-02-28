<?php
namespace App\Http\Controllers\Cart;

use App\Http\Controller\Frontend;
use Illuminate\Support\Facades\Input;

class ItemController extends Frontend
{

    public function __construct()
    {
        $this->loadLayout();
    }

    public function postAdd()
    {
        workflow('cart_item_add')->handle(Input::all());

        return redirect('cart');
    }

    public function postUpdate()
    {
        workflow('cart_item_update')->handle(Input::all());

        return redirect('cart');
    }

}
