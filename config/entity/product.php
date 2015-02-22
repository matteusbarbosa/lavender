<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [


    'product' => [
        'class' => 'App\Database\Product',
        'scope' => Scope::IS_STORE,
        'attributes' => [
            'sku' => [
                'label' => 'Sku',
                'type' => Attribute::VARCHAR,
            ],
            'name' => [
                'label' => 'Name',
                'type' => Attribute::VARCHAR,
            ],
            'price' => [
                'label' => 'Price',
                'type' => Attribute::DECIMAL,
                'backend.table' => true,
                'default' => 0.00,
            ],
            'url' => [
                'label' => 'Url',
                'type' => Attribute::VARCHAR,
                'before_save' => 'App\Handlers\Attributes\Product\UrlKey'
            ],
            'special_price' => [
                'label' => 'Special Price',
                'type' => Attribute::DECIMAL,
                'default' => 0.00,
            ],
        ],
        'relationships' => [

            'categories' => [
                'entity' => 'category',
                'type' => Relationship::HAS_PIVOT,
                'table' => 'catalog_category_product',
            ],

        ],
    ],


];
