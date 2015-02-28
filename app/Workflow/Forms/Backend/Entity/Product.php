<?php
namespace App\Workflow\Forms\Backend\Entity;

use App\Workflow\Forms\Backend\Entity;

class Product extends Entity
{

    public $product;

    public function __construct($params)
    {
        $this->product = $params->entity;

        $this->addField('sku', [
            'label' => 'Sku',
            'type' => 'text',
            'value' => $this->product->sku,
        ]);

        $this->addField('name', [
            'label' => 'Name',
            'type' => 'text',
            'value' => $this->product->name,
        ]);

        $this->addField('price', [
            'label' => 'Price',
            'type' => 'text',
            'value' => $this->product->price,
        ]);

        parent::__construct($params);
    }

}