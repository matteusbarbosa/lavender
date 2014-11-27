<?php

// PROTECTED - DO NOT EDIT

return [

    'entity'            => [
        'class'         => null,
        'scope'         => Lavender::SCOPE_GLOBAL,
        'attributes'    => [],
        'relationships' => [],
    ],

    'attribute'         => [
        'label'    => null,
        'type'     => 'varchar',
        'parent'   => false,
        'default'  => null,
        'nullable' => true,
        'unique'   => false,

        // todo support this stuff
        'length'   => null,
        'unsigned' => true,
        'comment'  => null
    ],

    'layout' => [
        'layout' => null,
        'position' => 0,
        'mode'  => Lavender::LAYOUT_APPEND
    ],

    'route' => [
        'controller' => null,
        'action'     => null,
        'layout'     => null,
        'method'     => 'get',
        'filter'     => null,
        'with'       => []
    ],

    'relationship' => [
        'entity' => null,
        'type' => null,
        'table' => null,
        'column' => 'entity_id'
    ],

    'workflow' => [
        'transitions' => [],
        'callbacks' => [],
        'states' => [],
    ],


];
