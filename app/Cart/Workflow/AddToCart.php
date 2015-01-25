<?php
namespace Lavender\Cart\Workflow;

use Illuminate\Support\Facades\URL;
use Lavender\Support\Contracts\WorkflowContract;

class AddToCart implements WorkflowContract
{

    public function states($workflow)
    {
        return [

            10 => 'add',

        ];
    }

    public function options($workflow, $state)
    {
        return [];
    }

    public function add($cart)
    {
        return [

            'product' => [
                'type' => 'hidden',
                'value' => $cart->product ? $cart->product->id : -1,
                'validate' => ['required'],
            ],

            'qty' => [
                'label' => 'Qty',
                'type' => 'text',
                'value' => 1,
                'validate' => ['required'],
                'options' => ['class' => 'small-input'],
            ],

            'submit' => [
                'type' => 'button',
                'value' => 'Add to Cart',
                'options' => ['type' => 'submit'],
            ]

        ];
    }



}