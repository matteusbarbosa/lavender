<?php
namespace App\Workflow\Forms\Cart;

use Lavender\Support\Workflow;

class AddToCart extends Workflow
{

    public function __construct($params)
    {
        $this->options['url'] = url('cart/add');

        $this->addField('product', [
            'type' => 'hidden',
            'value' => isset($params->product) ? $params->product->id : -1,
            'validate' => ['required'],
        ]);

        $this->addField('qty', [
            'label' => 'Qty',
            'type' => 'text',
            'value' => 1,
            'validate' => ['required'],
            'options' => ['class' => 'small-input'],
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Add to Cart',
            'options' => ['type' => 'submit']
        ]);
    }

}