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
        'label' => null,
        'scope' => Lavender::ENTITY_SCOPE_GLOBAL,
        'type' => 'varchar',
        'parent' => false,
    ],

    'controller_action' => [
        'controller' => null,//'Lavender\Cms\DefaultController',
        'action' => null,//'getIndex',
        'layout' => null,//'default',
        'method' => 'get',
        'filter' => null,
    ],

    'eav' => [
        0 => 'varchar',
        1 => 'text',
        2 => 'int',
        3 => 'decimal',
        4 => 'date',
    ],

];
