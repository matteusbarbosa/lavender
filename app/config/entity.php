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
            'default_department' => [
                'label' => 'Default Department',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
        ],
        'defaults' => [
            1 => [
                'code' => 'default',
                'name' => 'Default Store',
                'url' => '',//set to your domain
                'default_department' => 'default',
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
            'subdomain' => [
                'label' => 'Sub-domain',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
            'default_theme' => [
                'label' => 'Default Theme',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
        ],
        'defaults' => [
            1 => [
                'code' => 'default',
                'name' => 'Default Catalog',
                'store_id' => 1,
                'subdomain' => 'www',
                'default_theme' => 'default'
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
            'parent_theme' => [
                'label' => 'Parent Theme',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'int',
                'parent' => 'theme'
            ],
        ],
        'defaults' => [
            1 => [
                'code' => 'default',
                'name' => 'Default Theme',
                'department_id' => 1,
            ],
        ]
    ],


    'theme_session' => [
        'table' => 'scope_session',
        'type' => Lavender::ENTITY_TYPE_FLAT,
        'timestamps' => true, // so we can delete old sessions
        'attributes' => [
            'session_token' => [
                'label' => 'Session Token',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'varchar',
            ],
            'theme_id' => [
                'label' => 'Theme',
                'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
                'type' => 'int',
                'parent' => 'theme'
            ],
        ],
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
