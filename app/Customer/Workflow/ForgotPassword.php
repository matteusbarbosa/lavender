<?php
namespace Lavender\Customer\Workflow;

use Illuminate\Support\Facades\URL;

use Lavender\Support\Workflow;

class ForgotPassword extends Workflow
{

    public function states()
    {
        return [

            10 => 'request_reset',

        ];
    }

    public function template($state)
    {
        return 'workflow.form.container';
    }

    public function options($state, $params)
    {
        return ['url' => URL::to('customer/post/customer_forgot_password/'.$state)];
    }

    public function fields($state, $params)
    {
        if($state != 'request_reset') return [];

        return [

            'email' => [
                'label' => 'Email',
                'type' => 'text',
                'validate' => ['required', 'email'],
            ],

            'submit' => [
                'type' => 'button',
                'value' => 'Reset',
                'options' => ['type' => 'submit'],
            ]

        ];
    }



}