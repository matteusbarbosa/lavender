<?php
namespace Lavender\Core\Config;
use Illuminate\Config\Repository as CoreConfig;

class Repository extends CoreConfig
{

    /**
     * Get the specified configuration value.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        list($namespace, $group, $item) = $this->parseKey($key);
        if($namespace == 'entity'){
            var_dump($key);
            die();
        }
        //do cache
        return parent::get($key, $default);
    }

}
