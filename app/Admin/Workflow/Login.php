<?php
namespace Lavender\Admin\Workflow;

use Illuminate\Support\Facades\URL;
use Lavender\Support\Contracts\WorkflowContract;

class Login implements WorkflowContract
{

    public function states($workflow)
    {
        return [

            10 => 'login',

        ];
    }

    public function options($workflow, $state, $view)
    {
        return [];
    }

    public function login()
    {
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