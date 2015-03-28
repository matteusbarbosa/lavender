<?php
namespace App\Workflow\Resources;

use App\Cart;
use App\Store;
use Illuminate\Contracts\Support\Arrayable;

class ShippingMethods implements Arrayable
{
    protected $store;
    protected $cart;

    public function __construct(Store $store, Cart $cart)
    {
        $this->store = $store;

        $this->cart = $cart;
    }

    public function toArray()
    {
        // todo capture rates

        return $this->values([
            'FEDEX Ground - $11.93',
            'FEDEX 2 Day - $23.08',
        ]);
    }


    protected function values($values)
    {
        $results = [];

        foreach($values as $id => $name){

            $results[] = [
                'label'   => $name,
                'name'    => 'shipping_method',
                'value'   => $id,
            ];

        }

        return $results;
    }

}