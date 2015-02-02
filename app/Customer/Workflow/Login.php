<?php
namespace Lavender\Customer\Workflow;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use Lavender\Support\Workflow;

class Login extends Workflow
{

    public function states()
    {
        return [

            10 => 'login_customer',

        ];
    }

    public function response($state)
    {
        return Redirect::to('account/dashboard');
    }

    public function options($state, $params)
    {
        return ['url' => URL::to('customer/post/existing_customer/'.$state)];
    }

    public function fields($state, $params)
    {
        if($state != 'login_customer') return [];

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