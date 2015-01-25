<?php

return [

    // theme
    'default' => [

        // head
        'page.section.head' => [

            'head.anchor' => [

                'store-name' => ['config' => 'store.name'],

            ],

            // styles
            'head.style' => [

                'default' => ['style' => 'css/global.css'],

                'frontend' => ['style' => 'css/frontend.css'],

            ],

            // section
            'head.script' => [

                // frontend javascript
                'frontend' => ['script' => 'js/frontend.js']

            ],

            'head.meta' => [

                // Prevent indexing
                'noindex' => ['meta' => ['name' => 'robots', 'content' => 'noindex, nofollow']]

            ]

        ],

        // footer
        'page.section.footer' => [

            'footer.bottom.before' => [

                'copyright' => ['layout' => 'page.section.footer.copyright'],

            ],

        ]

    ]

];