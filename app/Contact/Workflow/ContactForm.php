<?php
namespace Lavender\Contact\Workflow;

use Illuminate\Support\Facades\URL;

use Lavender\Support\Workflow;

class ContactForm extends Workflow
{
    public function states()
    {
        return [

            10 => 'show_form',

        ];
    }

    public function template($state)
    {
        return 'workflow.form.container';
    }

    public function options($state, $params)
    {
        return ['url' => URL::to('contactform/post/'.$state)];
    }

    public function fields($state, $params)
    {
        if($state != 'show_form') return [];

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