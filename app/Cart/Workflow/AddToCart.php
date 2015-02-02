<?php
namespace Lavender\Cart\Workflow;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Lavender\Support\Workflow;

class AddToCart extends Workflow
{

    public function states()
    {
        return [

            10 => 'add',

        ];
    }

    public function response($state)
    {
        return Redirect::to('cart');
    }

    public function options($state, $params)
    {
        return ['url' => URL::to('cart/post/add_to_cart/'.$state)];
    }

    public function fields($state, $params)
    {
        if($state != 'add') return [];

        return [

            'product' => [
                'type' => 'hidden',
                'value' => isset($params['product']) ? $params['product']->id : -1,
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