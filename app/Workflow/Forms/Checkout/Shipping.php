<?php
namespace App\Workflow\Forms\Checkout;

use App\Workflow\Forms\Address;
use Lavender\Support\Workflow;

class Shipping extends Workflow
{
    use Address;

    public $template = 'checkout.partials.shipping';

    public function __construct($params)
    {
        $this->options['action'] = url('checkout/shipping');

        $this->addCustomerAddress('shipping');

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Next',
            'options' => ['type' => 'submit']
        ]);
    }

}