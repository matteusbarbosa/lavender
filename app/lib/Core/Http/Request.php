<?php
namespace Lavender\Core\Http;

use Illuminate\Http\Request as HttpRequest;

class Request extends HttpRequest
{

    public function domain()
    {
        $domain = explode('.', parse_url($this->url())['host']);

        return implode('.', array_slice($domain, count($domain) - 2 ));
    }

    public function subdomain()
    {
        $domain = explode('.', parse_url($this->url())['host']);

        return implode('.', array_slice($domain, 0, count($domain) - 2 ));
    }

}