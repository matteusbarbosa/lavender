<?php

return [



    'store' => [
        'table' => 'scope_store',
        'type' => Lavender::ENTITY_TYPE_FLAT,
        'timestamps' => false,
        'attributes' => [
            'code' => [
                'label' => 'Code',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
            'name' => [
                'label' => 'Name',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
            'url' => [
                'label' => 'Url',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
        ],
        'defaults' => [
            1 => [
                'code' => 'default_store',
                'name' => 'Default Store',
                'url' => '',//set to your domain
            ],
        ]
    ],


    'department' => [
        'table' => 'scope_department',
        'type' => Lavender::ENTITY_TYPE_FLAT,
        'timestamps' => false,
        'attributes' => [
            'code' => [
                'label' => 'Code',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
            'name' => [
                'label' => 'Name',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
            'store_id' => [
                'label' => 'Store',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'int',
                'parent' => 'store'
            ],
            'path' => [
                'label' => 'Path',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
        ],
        'defaults' => [
            1 => [
                'code' => 'default_catalog',
                'name' => 'Default Catalog',
                'store_id' => 1,
                'path' => '/',
            ],
        ]
    ],


    'theme' => [
        'table' => 'scope_theme',
        'type' => Lavender::ENTITY_TYPE_FLAT,
        'timestamps' => false,
        'attributes' => [
            'code' => [
                'label' => 'Code',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
            'name' => [
                'label' => 'Name',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
            'department_id' => [
                'label' => 'Department',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'int',
                'parent' => 'department'
            ],
            // todo figure out theme model!!!
        ],
        'defaults' => [
            1 => [
                'code' => 'default_theme',
                'name' => 'Default Theme',
                'department_id' => 1,
            ],
        ]
    ],


    'product' => [
        'table' => 'product',
        'type' => Lavender::ENTITY_TYPE_EAV,
        'timestamps' => true,
        'attributes' => [
            'sku' => [
                'label' => 'Sku',
                'scope' => Lavender::ENTITY_SCOPE_VIEW,
                'type' => 'varchar',
            ],
            'name' => [
                'label' => 'Name',
                'scope' => Lavender::ENTITY_SCOPE_VIEW,
                'type' => 'varchar',
            ],
        ],
        'relationships' => [

        ]
    ],



];
