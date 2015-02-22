<?php
namespace App\Handlers\Rules;

use Illuminate\Support\Facades\Request;

class EnvMatch
{

    public function match($store)
    {
        if($store_id = Request::server('LAVENDER_STORE')){

            $found = $store->find($store_id);

            dd($found);

        }

        return false;
    }

}