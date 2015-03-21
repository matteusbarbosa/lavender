<?php
namespace App\Workflow\Forms\Customer;

use Lavender\Support\Workflow;

class Register extends Workflow
{

    public function __construct($params)
    {
        $this->options['action'] = url('customer/register');

        $this->addField('email', [
            'label' => 'Email',
            'type' => 'text',
            'validate' => ['required', 'email'],
        ]);
        $this->addField('password', [
            'label' => 'Password',
            'type' => 'password',
            'validate' => ['required'],
            'flash' => false,
        ]);
        $this->addField('password_confirmation', [
            'label' => 'Confirm Password',
            'type' => 'password',
            'validate' => ['required'],
            'flash' => false,
        ]);
        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Register',
            'options' => ['type' => 'submit'],
        ]);
    }

}