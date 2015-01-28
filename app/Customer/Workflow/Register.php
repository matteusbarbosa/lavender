<?php
namespace Lavender\Customer\Workflow;

use Illuminate\Support\Facades\URL;
use Lavender\Support\Contracts\WorkflowContract;

class Register implements WorkflowContract
{

    public function states()
    {
        return [

            10 => 'register_now',

            20 => 'register_customer',

        ];
    }

    public function template($state)
    {
        return 'workflow.form.container';
    }

    public function options($state)
    {
        return ['url' => URL::to('customer/post/new_customer/'.$state)];
    }

    public function register_now()
    {
        return [

            'submit' => [
                'type' => 'button',
                'value' => 'Register now!',
                'options' => ['type' => 'submit'],
            ]

        ];
    }


    public function register_customer()
    {
        return [

            'email' => [
                'label' => 'Email',
                'type' => 'text',
                'validate' => ['required', 'email'],
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
                'value' => 'Register',
                'options' => ['type' => 'submit'],
            ]

        ];
    }


}