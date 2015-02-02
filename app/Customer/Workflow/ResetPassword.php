<?php
namespace Lavender\Customer\Workflow;

use Illuminate\Support\Facades\URL;

use Lavender\Support\Workflow;

class ResetPassword extends Workflow
{

    public function states()
    {
        return [

            10 => 'do_reset',

        ];
    }

    public function options($state, $params)
    {
        return ['url' => URL::to('customer/post/customer_reset_password/'.$state)];
    }

    public function fields($state, $params)
    {
        if($state != 'do_reset') return [];

        return [

            'token' => [
                'type' => 'hidden',
                'validate' => ['required'],
            ],

            'password' => [
                'label' => 'Password',
                'type' => 'password',
                'validate' => ['required'],
                'flash' => false,
            ],

            'password_confirmation' => [
                'label' => 'Confirm Password',
                'type' => 'password',
                'validate' => ['required'],
                'flash' => false,
            ],

            'submit' => [
                'type' => 'button',
                'value' => 'Reset',
                'options' => ['type' => 'submit'],
            ]

        ];
    }



}