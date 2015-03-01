<?php
namespace App\Workflow\Forms\Backend;

use Lavender\Support\Workflow;

abstract class Entity extends Workflow
{

    public function __construct($params)
    {
        $entity = $params->entity;

        $this->addField('id', [
            'type' => 'hidden',
            'value' => $entity->id,
        ]);

        $this->addField('entity', [
            'type' => 'hidden',
            'value' => $entity->getEntityName(),
        ]);

        $this->addField('submit', [
            'type' => 'submit',
            'value' => 'Save',
            'options' => ['type' => 'submit']
        ]);
    }

}