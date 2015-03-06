<?php
namespace App\Workflow\Forms\Backend\Config;

use Lavender\Support\Workflow;

class Account extends Workflow
{
    public $template = 'backend.partials.form';

    public function __construct($params)
    {
        $this->options['action'] = url('backend/config/account');

        $this->addField('signup_email', [
            'label' => 'Send welcome email?',
            'type' => 'select',
            'resource' => 'yesno',
            'value' => config('store.signup_email'),
            'use_default' => true,
        ]);

        $this->addField('signup_confirm', [
            'label' => 'Must be confirmed?',
            'type' => 'select',
            'resource' => 'yesno',
            'value' => config('store.signup_confirm'),
            'use_default' => true,
        ]);

        $this->addField('submit', [
            'type' => 'submit',
            'value' => 'Save',
            'options' => ['type' => 'submit']
        ]);
    }

}