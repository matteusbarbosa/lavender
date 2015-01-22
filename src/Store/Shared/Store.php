<?php
namespace Lavender\Store\Shared;

use Illuminate\Support\Facades\Config;
use Lavender\Support\Contracts\EntityInterface;
use Lavender\Support\SharedEntity;

class Store extends SharedEntity
{
    protected $_data = [];

    function __construct($store = null)
    {
        if(!$store instanceof EntityInterface){

            $store = $this->findStore();

        }

        $this->setStore($store);
    }

    public function setStore(EntityInterface $store)
    {
        $this->setEntity($store);
    }

    protected function findStore()
    {
        $rules = Config::get('store.store_rules');

        ksort($rules);

        foreach($rules as $rule){

            $rule = new $rule;

            if($store = $rule->match(entity('store'))){

                return $store;

            }
        }

        return $this->findDefault();
    }

    protected function findDefault()
    {
        return entity('store')->where('default', '=', true)->first();
    }

}