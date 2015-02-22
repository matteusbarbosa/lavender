<?php
namespace App\Handlers\Attributes\Product;

class UrlKey
{
    public function before_save(&$value)
    {
        // create unique url if one not provided
        if(!$value) $value = uniqid();
    }
}