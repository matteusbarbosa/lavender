<?php
namespace App\Workflow\Forms\Checkout;

use Lavender\Support\Workflow;

class Payment extends Workflow
{

    public function __construct($params)
    {
        $this->options['action'] = url('checkout/payment');

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Next',
            'options' => ['type' => 'submit']
        ]);
    }

}