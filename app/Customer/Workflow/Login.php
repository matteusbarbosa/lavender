<?php
namespace Lavender\Customer\Workflow;

use Illuminate\Support\Facades\URL;
use Lavender\Support\Contracts\WorkflowContract;

class Login implements WorkflowContract
{

    public function states()
    {
        return [

            10 => 'login_customer',

        ];
    }

    public function template($state)
    {
        return 'workflow.form.container';
    }

    public function options($state)
    {
        return ['url' => URL::to('customer/post/existing_customer/'.$state)];
    }

    public function login_customer()
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
                'comment' => "<a href='".URL::to('account/forgot_password')."'>Forgot your password?</a>",
                'flash' => false,
            ],

            'submit' => [
                'type' => 'button',
                'value' => 'Login',
                'options' => ['type' => 'submit'],
            ]

        ];
    }



}