<?php
namespace App\Workflow\Forms\Customer\Register;

use Lavender\Support\Workflow;

class CallToAction extends Workflow
{

    public function __construct($params)
    {
        $this->options['action'] = url('customer/register');

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Register now!',
            'options' => ['type' => 'submit'],
        ]);
    }

}