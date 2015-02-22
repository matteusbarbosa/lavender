<?php
namespace App\Workflow\Forms\Backend;

use Lavender\Support\Workflow;

class Entity extends Workflow
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
            'value' => $entity->getEntity(),
        ]);

        foreach($entity->backendTable() as $field => $attribute){

            $this->addField($field, [
                'label' => $attribute['label'],
                'type' => $attribute['backend.input'],
                'value' => $entity->$field,
                'validate' => $attribute['backend.validate'],
            ]);

        }

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Save',
            'options' => ['type' => 'submit']
        ]);
    }




}