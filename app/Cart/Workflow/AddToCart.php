<?php
namespace Lavender\Cart\Workflow;

use Illuminate\Support\Facades\URL;
use Lavender\Support\Contracts\WorkflowContract;

class AddToCart implements WorkflowContract
{

    public function states()
    {
        return [

            10 => 'add',

        ];
    }

    public function template($state)
    {
        return 'workflow.form.container';
    }

    public function options($state)
    {
        return ['url' => URL::to('cart/post/add_to_cart/'.$state)];
    }

    public function add($params)
    {
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