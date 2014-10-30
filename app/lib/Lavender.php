<?php
use Lavender\Core\Database\Entity;
//use Lavender\Core\Config\Repository as Config;

final class Lavender
{
    // Attribute Storage Type
    const ENTITY_TYPE_FLAT = "Lavender\\Core\\Database\\Entity\\Type\\Flat";
    const ENTITY_TYPE_EAV = "Lavender\\Core\\Database\\Entity\\Type\\Eav";

    // Attribute Scopes
    const ENTITY_SCOPE_GLOBAL = 'global';
    const ENTITY_SCOPE_STORE = 'store';
    const ENTITY_SCOPE_DEPARTMENT = 'department';
    const ENTITY_SCOPE_VIEW = 'view';

    protected static $config;
    protected static $store;
    protected $department;
    protected $view;

    public static function getStore()
    {
        return self::$store;
    }

    public static function setStore($store)
    {
        if(is_string($store)){
            $store = self::entity('store')->findByAttribute('code', $store);
        }
        self::$store = $store;
    }

    /**
     * Load a pre-configured entity
     *
     * @param $identifier
     * @return Entity
     */
    public static function entity($identifier, $default = array())
    {
        return \App::make($identifier, $default);
    }


    /**
     * Get all entity config
     *
     * @return array
     */
    public static function allEntityConfig()
    {
        $_config = [];
        foreach(Config::get('entity') as $identifier => $entity){
            $_config[$identifier] = array_merge(
                Config::get('defaults.entity'),
                $entity
            );
        }
        return $_config;
    }

}