<?php
namespace App\Workflow\Forms\Cart\Shipment;

use Lavender\Support\Workflow;

class Method extends Workflow
{
    public function __construct($params)
    {
        $this->addField('shipment_method', [
            'label'    => 'Select a shipping option:',
            'type'     => 'radiolist',
            'resource' => 'shipment_methods',
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Next',
            'options' => ['type' => 'submit']
        ]);
    }

}