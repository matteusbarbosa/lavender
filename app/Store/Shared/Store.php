<?php
namespace Lavender\Store\Shared;

use Illuminate\Support\Facades\Config;
use Lavender\Support\Contracts\EntityInterface;
use Lavender\Support\SharedEntity;

class Store extends SharedEntity
{

    public function bootStore($store = null)
    {
        if(!$store instanceof EntityInterface) $store = $this->findStore();

        if($store->exists) $this->setStore($store);

        return $this->exists;
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
        $default = entity('store')->where('default', '=', true)->first();

        return $default ?: entity('store');
    }

    public function __get($key)
    {
        return isset($this->_data[$key]) ? $this->_data[$key] : Config::get('store.'.$key);
    }

}