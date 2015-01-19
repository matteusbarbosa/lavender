<?php

return [


    'default' => [

        'backend/entity/{entity}' => [
            'controller' => 'Lavender\Manager\Controllers\EntityController',
            'action'     => 'loadTable',
            'before' => 'backend',
        ],

        'backend/entity/{entity}/id/{id}' => [
            'controller' => 'Lavender\Manager\Controllers\EntityController',
            'action'     => 'loadForm',
            'before' => 'backend',
        ],

    ],


];
