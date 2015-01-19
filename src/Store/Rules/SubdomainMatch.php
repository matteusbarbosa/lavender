<?php
namespace Lavender\Store\Rules;

use Illuminate\Support\Facades\Request;

class SubdomainMatch
{

    public function match($store)
    {
        return $store->whereHas('config', function($q){

            $hostname = Request::server('SERVER_NAME');

            $host = explode('.', $hostname);

            $subdomain = array_slice($host, count($host) - 3, count($host) - 2);

            $q->where('key', '=', 'subdomain');

            $q->where('value', '=', $subdomain);

        })->first();
    }

}