<?php
namespace Lavender\Cart\Shared;

use Lavender\Support\Contracts\EntityInterface;
use Lavender\Support\SharedEntity;

class Cart extends SharedEntity
{

    function __construct($cart = null)
    {
        if(!$cart instanceof EntityInterface){

            $cart = $this->findOrNew();

        }

        $this->setCart($cart);
    }

    public function getCart()
    {
        return entity('cart')->find($this->id);
    }

    public function unsetCart()
    {
        $this->setSessionVariable(null);

        $this->unsetData();
    }

    public function setCart(EntityInterface $cart)
    {
        // set cart id in session
        $this->setSessionVariable($cart->id);

        // set cart entity data
        $this->setEntity($cart);
    }


    public function getSummary()
    {
        $items_count = 0;

        foreach($this->items as $item){

            $items_count += $item->qty;

        }

        return $items_count;
    }


    public function findInSession()
    {
        // check if session has a cart id
        if($cart_id = $this->getSessionVariable()){

            // if a session id is found, verify that it belongs to a cart
            return entity('cart')->find($cart_id);

        }

        return false;
    }

    protected function findOrNew()
    {
        if(!$cart = $this->findInSession()){

            $cart = $this->newCartInstance();

        }

        return $cart;
    }


    protected function newCartInstance()
    {
        // create new cart instance
        $cart = entity('cart');

        $cart->save();

        return $cart;

    }

    /**
     * @param $name
     * @return mixed
     */
    private function getSessionVariable()
    {
        return \Session::get("sales_cart");
    }

    /**
     * @param $name
     * @param $state
     */
    private function setSessionVariable($var)
    {
        \Session::put("sales_cart", $var);
    }

}