<?php
namespace App\Workflow\Forms\Backend\Entity;

use App\Workflow\Forms\Backend\Entity;

class Category extends Entity
{

    public $category;

    public function __construct($params)
    {
        $this->category = $params->entity;

        $this->addField('name', [
            'label' => 'Name',
            'type' => 'text',
            'value' => $this->category->name,
        ]);

        parent::__construct($params);
    }

}