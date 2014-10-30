<?php

// PROTECTED - DO NOT EDIT

return [

    'entity' => [
        'table' => null,
        'type' => Lavender::ENTITY_TYPE_FLAT,
        'timestamps' => false,
        'attributes' => [],
        'relationships' => [],
        'defaults' => [],
    ],

    'attribute' => [
        'label' => '',
        'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
        'type' => 'varchar',
    ],

    'eav' => [
        0 => 'varchar',
        1 => 'text',
        2 => 'int',
        3 => 'decimal',
        4 => 'date',
    ],

];
