<?php
namespace App\Workflow\Resources;

use App\Cart;
use App\Events\Cart\Shipping\CaptureRates;
use App\Store;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Support\Arrayable;

class ShipmentMethods implements Arrayable
{
    protected $store;
    protected $cart;
    protected $events;

    public function __construct(Store $store, Cart $cart, Dispatcher $events)
    {
        $this->store = $store;

        $this->cart = $cart;

        $this->events = $events;
    }

    public function toArray()
    {
        $results = [];

        $shipments = $this->cart->getShipments();

        foreach($shipments as $shipment){

            // todo validate $shipment->address
            $rates = $this->events->fire(new CaptureRates($shipment->address));

            foreach($rates as $rate){

                $results[] = [
                    'label'   => $rate->name,
                    'name'    => 'shipment_method',
                    'value'   => $rate->id,
                ];

            }



        }

        return $results;
    }

}