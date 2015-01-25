<?php

return [


    'default' => [


        'backend' => [

            'layout' => 'backend.dashboard',

            'before' => 'backend',

        ],

        'backend/login' => [

            'layout' => 'backend.index'

        ],

        'backend/entity/{entity}' => [
            'controller' => 'Lavender\Backend\Controllers\EntityController',
            'action'     => 'loadTable',
            'before' => 'backend',
        ],

        'backend/entity/{entity}/id/{id}' => [
            'controller' => 'Lavender\Backend\Controllers\EntityController',
            'action'     => 'loadForm',
            'before' => 'backend',
        ],

    ],


];
