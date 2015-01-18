<?php
namespace Lavender\Cart\Database;

use Lavender\Entity\Database\Entity;
use Lavender\Support\Traits\BootableEntity;

class Cart extends Entity
{
    use BootableEntity;

    protected $entity = 'cart';

    protected $table = 'sales_cart';

    public function getSummary()
    {
        $items_count = 0;

        foreach($this->items as $item){

            $items_count += $item->qty;

        }

        return $items_count;
    }

    public static function find($id, $columns = array('*'))
    {
        if($id == 'session') return self::findInSession();

        return parent::find($id, $columns);
    }


    public static function findInSession()
    {
        // if has cart (load both carts from session, and if logged in, get cart from user)
        if($cart_id = self::getSessionVariable()){

            // todo:
            //      if(session cart id != user cart id)
            //          merge into user cart,
            //          delete original session cart id,
            //          set new session cart id

            return self::find($cart_id);

        }
        // create new cart instance
        $cart_instance = new static;

        $cart_instance->save();

        // set new session cart id
        self::setSessionVariable($cart_instance->id);

        return $cart_instance;
    }

    /**
     * @param $name
     * @return mixed
     */
    private static function getSessionVariable()
    {
        return \Session::get("sales_cart");
    }

    /**
     * @param $name
     * @param $state
     */
    private static function setSessionVariable($var)
    {
        \Session::put("sales_cart", $var);
    }

}