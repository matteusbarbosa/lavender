<?php

return [

    'default' => [
        'methods' => [

            'get' => [
                '/'                     =>  'Lavender\Cms\DefaultController@getIndex',
            ],

            'post' => [

            ],

        ]
    ],

    'alt' => [
        'methods' => [

            'get' => [
                '/'                     =>  'Lavender\Cms\DefaultController@getAlt',
            ],

            'post' => [

            ],

        ]
    ],

];
