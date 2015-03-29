<?php
namespace App\Commands\Cart;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class Shipment extends Command implements SelfHandling
{

    /**
     * Create a new instance.
     */
    public function __construct($shipment, $method)
    {
        $this->method     = $method;

        $this->shipment   = $shipment;
    }

    /**
     * Execute the command.
     */
    public function handle()
    {
        $this->shipment->update([
            'method' => $this->method
        ]);
    }

}
