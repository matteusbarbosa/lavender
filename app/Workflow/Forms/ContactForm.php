<?php
namespace App\Workflow\Forms;

use Lavender\Support\Workflow;

class ContactForm extends Workflow
{

    public function __construct($params)
    {
        $this->addField('email', [
            'label' => 'Email',
            'label_options' => ['class' => 'contact-form'],
            'type' => 'text',
            'validate' => ['required', 'email'],
            'options' => ['class' => 'foo'],
            'flash' => false,
        ]);

        $this->addField('comment', [
            'label' => 'Comment',
            'label_options' => ['class' => 'contact-form'],
            'type' => 'textarea',
            'validate' => ['required', 'min:20'],
            'options' => ['id' => 'foo'],
            'flash' => false,
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Send',
            'options' => ['type' => 'submit']
        ]);
    }

}
