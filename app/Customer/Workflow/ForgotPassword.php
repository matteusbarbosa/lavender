<?php
namespace Lavender\Customer\Workflow;

use Lavender\Support\Contracts\WorkflowContract;

class ForgotPassword implements WorkflowContract
{

    public function states($workflow)
    {
        return [

            10 => 'request_reset',

        ];
    }

    public function options($workflow, $state)
    {
        return [];
    }

    public function request_reset()
    {
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