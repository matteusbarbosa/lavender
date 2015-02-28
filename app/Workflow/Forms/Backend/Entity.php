<?php
namespace App\Workflow\Forms\Backend;

use Lavender\Support\Facades\Message;
use Lavender\Support\Workflow;

abstract class Entity extends Workflow
{

    public function __construct($params)
    {
        $entity = $params->entity;

        Message::addNotice('todo tabs');

        $this->addField('id', [
            'type' => 'hidden',
            'value' => $entity->id,
        ]);

        $this->addField('entity', [
            'type' => 'hidden',
            'value' => $entity->getEntityName(),
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Save',
            'options' => ['type' => 'submit']
        ]);
    }

}