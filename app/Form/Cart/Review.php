<?php
namespace App\Form\Cart;

use Lavender\Support\Form;

class Review extends Form
{
    public function __construct($params)
    {
        $this->addField('submit', [
            'type' => 'button',
            'validate' => ['required'],
            'value' => 'Place Order',
            'options' => ['type' => 'submit']
        ]);
    }

}