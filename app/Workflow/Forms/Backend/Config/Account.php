<?php
namespace App\Workflow\Forms\Backend\Config;

use Lavender\Support\Workflow;

class Account extends Workflow
{

    public function __construct($params)
    {
        $this->options['action'] = url('backend/config/account');

        $this->addField('signup_email', [
            'label' => 'Send welcome email?',
            'type' => 'select',
            'resource' => 'yesno',
            'value' => config('store.signup_email'),
        ]);

        $this->addField('signup_confirm', [
            'label' => 'Must be confirmed?',
            'type' => 'select',
            'resource' => 'yesno',
            'value' => config('store.signup_confirm'),
        ]);

        $this->addField('submit', [
            'type' => 'submit',
            'value' => 'Save',
            'options' => ['type' => 'submit']
        ]);
    }

}