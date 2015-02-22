<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [

    'category' => [
        'class' => 'App\Database\Category',
        'scope' => Scope::IS_DEPARTMENT,
        'attributes' => [
            'name' => [
                'label' => 'Name',
                'type' => Attribute::VARCHAR,
                'backend.table' => true,
                'backend.renderer' => 'App\Handlers\Attributes\EditLink',
            ],
            'description' => [
                'label' => 'Description',
                'type' => Attribute::TEXT,
            ],
            'url' => [
                'label' => 'Url',
                'type' => Attribute::VARCHAR,
                'before_save' => 'App\Handlers\Attributes\Category\UrlKey'
            ],
        ],
        'relationships' => [

            'products' => [
                'entity' => 'product',
                'type' => Relationship::HAS_PIVOT,
                'table' => 'catalog_category_product',
            ],
            'parent' => [
                'entity' => 'category',
                'type' => Relationship::BELONGS_TO,
            ],
            'children' => [
                'entity' => 'category',
                'type' => Relationship::HAS_MANY,
            ],

        ],

    ],


    'store' => [
        'relationships' => [
            'root_category' => [
                'entity' => 'category',
                'type' => Relationship::BELONGS_TO,
            ]
        ]
    ]


];
