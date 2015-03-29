<?php
namespace App\Workflow\Forms\Cart;

use Lavender\Support\Workflow;

class Review extends Workflow
{
    public function __construct($params)
    {
        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Place Order',
            'options' => ['type' => 'submit']
        ]);
    }

}