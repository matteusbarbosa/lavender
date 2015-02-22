<?php
namespace App\Workflow\Forms\Customer;

use Lavender\Support\Workflow;

class ForgotPassword extends Workflow
{

    public function __construct($params)
    {
        $this->options['url'] = URL::to('customer/forgot_password');

        $this->addField('email', [
            'label' => 'Email',
            'type' => 'text',
            'validate' => ['required', 'email'],
        ]);
        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Reset',
            'options' => ['type' => 'submit'],
        ]);
    }

}