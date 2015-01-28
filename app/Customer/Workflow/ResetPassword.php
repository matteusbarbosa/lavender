<?php
namespace Lavender\Customer\Workflow;

use Illuminate\Support\Facades\URL;
use Lavender\Support\Contracts\WorkflowContract;

class ResetPassword implements WorkflowContract
{

    public function states()
    {
        return [

            10 => 'do_reset',

        ];
    }

    public function template($state)
    {
        return 'workflow.form.container';
    }

    public function options($state)
    {
        return ['url' => URL::to('customer/post/customer_reset_password/'.$state)];
    }

    public function do_reset()
    {
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