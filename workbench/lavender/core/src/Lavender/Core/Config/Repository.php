<?php

namespace Lavender\Core\Config;

class Repository extends \Illuminate\Config\Repository
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
        //do cache
        return parent::get($key, $default);
    }

}
