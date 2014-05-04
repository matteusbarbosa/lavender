<?php

namespace Lavender\Pos;

use Illuminate\Support\Facades\Auth;
use Lavender\Core\Controller\BaseController;
use Lavender\Crm\User;
use Lavender\Pos\Item;
use Lavender\Pos\Cart\Item as Cart_Item;

class CartController extends BaseController
{

    protected $layout = 'pos::cart.default';
    protected $user;


    protected function user()
    {
        if(isset($this->user)){
            return $this->user;
        }
        return $this->user = Auth::user();
    }

    public function getCart()
    {
        $cart = $this->user()->cart;
        return $this->layout->with('cart', $cart);
    }

    public function addToCart($item_id)
    {
        $cart = $this->user()->cart;
        $item = Item::find($item_id);
        Cart_Item::create([
            'cart_id' => $cart->id,
            'item_id' => $item->id,
        ]);
        return \Redirect::to(\URL::previous());
    }


}