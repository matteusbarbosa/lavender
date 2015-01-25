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

            'head.meta' => [

                // Prevent indexing
                'noindex' => ['meta' => ['name' => 'robots', 'content' => 'noindex, nofollow']]

            ]

        ],

        // header
        'backend.section.header' => [

            'header.top.links' => [

                'frontend_link' => ['content' => '<li>'.HTML::link('/','Go to frontend').'</li>', 'position' => 10],

            ]

        ],


    ]


];