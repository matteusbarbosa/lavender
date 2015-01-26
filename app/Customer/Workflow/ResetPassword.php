<?php
namespace Lavender\Customer\Workflow;

use Lavender\Support\Contracts\WorkflowContract;

class ResetPassword implements WorkflowContract
{

    public function states($workflow)
    {
        return [

            10 => 'do_reset',

        ];
    }

    public function options($workflow, $state, $view)
    {
        return [];
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