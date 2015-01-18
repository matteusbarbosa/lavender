<?php

return [

    'default' => [

        // header
        'page.section.header' => [

            'header.top.links' => [

                'login_link' => ['layout' => 'page.link.login'],

            ]

        ],

        'customer.login' => [

            'left' => [

                'new_customer' =>       ['workflow' => 'new_customer'],

            ],

            'right' => [

                'existing_customer' =>  ['workflow' => 'existing_customer'],

            ]

        ],

        'customer.forgot_password' => [

            'content' => [

                'forgot_password' =>    ['workflow' => 'customer_forgot_password']

            ]

        ],

        'customer.reset_password' => [

            'content' => [

                'reset_password' =>     ['workflow' => 'customer_reset_password']

            ]

        ],

    ]



];