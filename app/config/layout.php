<?php

return [

    // theme
    'default' => [

        // template
        'page.section.head' => [

            // section
            'head.script' => [

                // Custom javascript
                'custom_scripts' => ['layout' => script('js/script.js')]

            ],

            'head.style' => [

                // Custom stylesheet
                'custom_styles' => ['layout' => style('css/styles.css')]

            ],

            'head.meta' => [

                // Prevent indexing
                'noindex' => ['layout' => meta('robots', 'noindex, nofollow')]

            ]

        ]

    ]

];