<?php
namespace App\Workflow\Forms\Cart;

use Lavender\Support\Workflow;

class Payment extends Workflow
{
    public function __construct($params)
    {
        $this->addField('payment_method', [
            'label'    => 'Select a payment option:',
            'type'     => 'radiolist',
            'resource' => 'payment_methods',
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Next',
            'options' => ['type' => 'submit']
        ]);
    }

}