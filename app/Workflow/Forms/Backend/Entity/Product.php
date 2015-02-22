<?php
namespace App\Workflow\Forms\Backend\Entity;

use App\Workflow\Forms\Backend\Entity;

class Product extends Entity
{

    public function __construct($params)
    {
        $entity = $params->entity;

        $this->addField('sku', [
            'label' => 'Sku',
            'type' => 'text',
            'value' => $entity->sku,
        ]);

        $this->addField('name', [
            'label' => 'Name',
            'type' => 'text',
            'value' => $entity->name,
        ]);

        parent::__construct($params);
    }

}