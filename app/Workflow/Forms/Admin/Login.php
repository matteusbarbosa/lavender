<?php
namespace App\Workflow\Forms\Admin;

use Lavender\Support\Workflow;

class Login extends Workflow
{

    public function __construct($params)
    {
        $this->addField('email', [
            'label' => 'Email',
            'type' => 'text',
            'validate' => ['required', 'email'],
            'flash' => false,
        ]);

        $this->addField('password', [
            'label' => 'Password',
            'type' => 'password',
            'validate' => ['required'],
            'comment' => "<a href='".url('backend/forgot_password')."'>Forgot your password?</a>",
            'flash' => false,
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Login',
            'options' => ['type' => 'submit']
        ]);
    }

}
