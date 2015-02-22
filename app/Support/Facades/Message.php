<?php
namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

class Message extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'message.service';
    }
}
