<?php

return [

    'default' => [

        // template
        'backend.section.head' => [

            'head.anchor' => [

                'store-name' => ['config' => 'store.name'],

            ],

            'head.style' => [

                'default' => ['style' => 'css/global.css'],

                'backend' => ['style' => 'css/backend.css'],

            ],

        ],


        'backend.index' => [

            'content' => [

                'login' => ['workflow' => 'admin_login'],

            ],

        ],

    ]


];