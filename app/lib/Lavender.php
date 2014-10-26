<?php
use Lavender\Core\Database\Entity;

final class Lavender
{
    const ENTITY_SCOPE_GLOBAL = 'global';
    const ENTITY_SCOPE_STORE = 'store';
    const ENTITY_SCOPE_DEPARTMENT = 'department';
    const ENTITY_SCOPE_VIEW = 'view';

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
        $path =  app_path()."/routes/{$store->code}/routes.php";
        if (file_exists($path)) require $path;
    }

    /**
     * Load a pre-configured entity
     *
     * @param $identifier
     * @return Entity
     */
    public static function entity($identifier, $default = array())
    {
        return new Entity($identifier, $default);
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