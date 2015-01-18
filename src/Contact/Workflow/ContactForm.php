<?php
namespace Lavender\Contact\Workflow;

use Lavender\Support\Contracts\WorkflowContract;

class ContactForm implements WorkflowContract
{
    public function states($workflow)
    {
        return [

            10 => 'show_form',

        ];
    }

    public function options($workflow, $state)
    {
        return [];
    }

    public function show_form()
    {
        return [

            'email' => [
                'label' => 'Email',
                'label_options' => ['class' => 'contact-form'],
                'type' => 'text',
                'validate' => ['required', 'email'],
                'options' => ['class' => 'foo'],
                'flash' => false,
            ],

            'comment' => [
                'label' => 'Comment',
                'label_options' => ['class' => 'contact-form'],
                'type' => 'textarea',
                'validate' => ['required', 'min:20'],
                'options' => ['id' => 'foo'],
                'flash' => false,
            ],

            'submit' => [
                'type' => 'button',
                'value' => 'Send',
                'options' => ['type' => 'submit']
            ]

        ];
    }

}