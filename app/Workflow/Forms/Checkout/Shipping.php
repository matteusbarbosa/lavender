<?php
namespace App\Workflow\Forms\Checkout;

use Lavender\Support\Workflow;

class Shipping extends Workflow
{

    public function __construct($params)
    {
        $this->options['action'] = url('checkout/shipping');

        $this->addField('method', [
            'label' => 'Shipping Method',
            'type' => 'text',
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Next',
            'options' => ['type' => 'submit']
        ]);
    }

}