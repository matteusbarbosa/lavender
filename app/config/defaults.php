<?php

// PROTECTED - DO NOT EDIT

return [

    'entity' => [
        'table' => null,
        'type' => Lavender::ENTITY_FLAT,
        'scope' => Lavender::SCOPE_GLOBAL,
        'timestamps' => false,
        'attributes' => [],
        'relationships' => [],
        'defaults' => [],
    ],

    'attribute' => [
        'label' => null,
        'type' => 'varchar',
        'parent' => false,
        'default' => null,// defaults must be less than 50 char
        // todo support this stuff
        'length'    => null,
        'unsigned'  => true,
        'nullable'  => true,
        'comment'   => null
    ],

    'controller_action' => [
        'controller' => null,//'Lavender\Cms\DefaultController',
        'action' => null,//'getIndex',
        'layout' => null,//'default',
        'method' => 'get',
        'filter' => null,
    ],

];
