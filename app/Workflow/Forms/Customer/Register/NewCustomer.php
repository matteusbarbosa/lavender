<?php
namespace App\Workflow\Forms\Customer\Register;

use Lavender\Support\Workflow;

class NewCustomer extends Workflow
{

    public function __construct($params)
    {
        $this->options['url'] = url('customer/register');

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