<?php
namespace App\Http\Controllers;

use App\Http\Controller\Frontend;
use Illuminate\Support\Facades\Input;

class CartController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();
	}

	public function getIndex()
	{
		return view('cart.page');
	}

    public function postAdd()
    {
        workflow('add_to_cart')->handle(Input::all());

        return redirect('cart');
    }

}
