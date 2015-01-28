<?php
namespace Lavender\Customer\Workflow;

use Illuminate\Support\Facades\URL;
use Lavender\Support\Contracts\WorkflowContract;

class ForgotPassword implements WorkflowContract
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

    public function options($state)
    {
        return ['url' => URL::to('customer/post/customer_forgot_password/'.$state)];
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