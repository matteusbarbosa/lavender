<?php
namespace App;

use Lavender\Contracts\Entity;
use Lavender\Support\SharedEntity;

class Cart extends SharedEntity
{

    function __construct()
    {
        if(!$cart = $this->findInSession()){

            $cart = $this->newCartInstance();

        }

        $this->setCart($cart);
    }

    public function getCart()
    {
        return entity('cart')->find($this->id);
    }

    public function unsetCart()
    {
        $this->setCartSession(null);

        $this->unsetData();
    }

    public function setCart(Entity $cart)
    {
        // set cart id in session
        $this->setCartSession($cart->id);

        // set cart entity data
        $this->setEntity($cart);
    }



    public function getItemsCount()
    {
        $cart = $this->getCart();

        return $cart->items->count();
    }


    public function getSummary()
    {
        $items_count = 0;

        $cart = $this->getCart();

        foreach($cart->items as $item){

            $items_count += $item->qty;

        }

        return $items_count;
    }


    public function getTotal()
    {
        $total = 0;

        $cart = $this->getCart();

        foreach($cart->items as $item){

            $total += $item->getSubtotal();

        }

        return price($total);
    }


    protected function findInSession()
    {
        // check if session has a cart id
        if($cart_id = $this->getCartSession()){

            // if a session id is found, verify that it belongs to a cart
            return entity('cart')->find($cart_id);

        }

        return false;
    }


    protected function newCartInstance()
    {
        // create new cart instance
        $cart = entity('cart');

        $cart->save();

        return $cart;

    }


    /**
     * @return mixed
     */
    protected function getCartSession()
    {
        return \Session::get("sales_cart");
    }


    /**
     * @param $var
     */
    protected function setCartSession($var)
    {
        \Session::put("sales_cart", $var);
    }

}