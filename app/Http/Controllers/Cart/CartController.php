<?php
namespace App\Http\Controllers\Cart;

use App\Http\Controller\Frontend;
use Illuminate\Support\Facades\Input;

class CartController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();

        $this->middleware('cart', ['except' => 'getEmpty']);
	}

	public function getIndex()
	{
		return view('cart.page');
	}

	public function getEmpty()
	{
		return view('cart.empty');
	}

}
