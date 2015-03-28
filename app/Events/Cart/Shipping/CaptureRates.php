<?php
namespace App\Events\Cart\Shipping;

use App\Events\Event;
use Lavender\Contracts\Entity;

class CaptureRates extends Event
{
    public $address;

    function __construct(Entity $address)
    {
        $this->address = $address;
    }

}