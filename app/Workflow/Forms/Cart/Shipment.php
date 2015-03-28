<?php
namespace App\Workflow\Forms\Cart;

use App\Cart;
use App\Workflow\Forms\Address;
use Lavender\Support\Workflow;

class Shipment extends Workflow
{
    use Address;

    public function __construct($params, Cart $cart)
    {
        if(!$cart->hasShipmentAddress()){

            $this->addAddress('shipment');

        } else {

            $this->addField('shipment_method', [
                'label'    => 'Select a shipping option:',
                'type'     => 'radiolist',
                'resource' => 'shipment_methods',
            ]);

        }

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Next',
            'options' => ['type' => 'submit']
        ]);
    }

}