<?php
namespace App\Http\Controllers\Cart;

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

}
