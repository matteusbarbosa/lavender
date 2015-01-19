<?php
namespace Lavender\Store\Rules;

use Illuminate\Support\Facades\Request;

class EnvMatch
{

    public function match($store)
    {
        $store_id = Request::server('LAVENDER_STORE');

        return $store->find($store_id);
    }

}