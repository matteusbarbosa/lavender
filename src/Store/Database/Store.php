<?php
namespace Lavender\Store\Database;

use Illuminate\Support\Facades\Config;
use Lavender\Entity\Database\Entity;

class Store extends Entity
{

    protected $entity = 'store';

    protected $table = 'store';

    public $timestamps = false;

    public static function find($id, $columns = ['*'])
    {
        if($id == 'rules') return self::findWithRules();

        return parent::find($id, $columns);
    }

    public static function findWithRules()
    {
        $rules = Config::get('store.store_rules');

        ksort($rules);

        foreach($rules as $rule){

            $rule = new $rule;

            if($store = $rule->match(new static)){

                return $store;

            }
        }

        return self::findDefault();
    }

    protected static function findDefault()
    {
        if(!$default = self::where('default', '=', true)->first()){

            $default = new static;

        }

        return $default;
    }

}