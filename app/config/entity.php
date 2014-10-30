<?php

return [



    'store' => [
        'table' => 'store',
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
            0 => [
                'code' => 'default',
                'name' => 'default',
                'url' => '',//set to your domain
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
