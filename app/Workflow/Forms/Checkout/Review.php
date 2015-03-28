<?php
namespace App\Workflow\Forms\Checkout;

use Lavender\Support\Workflow;

class Review extends Workflow
{

    public function __construct($params)
    {
        $this->options['action'] = url('checkout/review');

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Place Order',
            'options' => ['type' => 'submit']
        ]);
    }

}