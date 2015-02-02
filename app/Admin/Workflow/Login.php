<?php
namespace Lavender\Admin\Workflow;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use Lavender\Support\Workflow;

class Login extends Workflow
{

    public function states()
    {
        return [

            10 => 'login',

        ];
    }

    public function response($state)
    {
        return Redirect::to('backend');
    }

    public function options($state, $params)
    {
        return ['url' => URL::to('backend/admin/post/'.$state)];
    }

    public function fields($state, $params)
    {
        if($state != 'login') return [];

        return [

            'username' => [
                'label' => 'Username',
                'type' => 'text',
                'validate' => ['required'],
            ],

            'password' => [
                'label' => 'Password',
                'type' => 'password',
                'validate' => ['required'],
                'comment' => "<a href='".URL::to('backend/forgot_password')."'>Forgot your password?</a>",
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