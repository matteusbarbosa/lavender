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
        'default'  => null, // defaults must be less than 50 char
        'nullable' => true,
        'unique'   => false,

        // todo support this stuff
        'length'   => null,
        'unsigned' => true,
        'comment'  => null
    ],

    'layout' => [
//        'callback' => null,
//        'layout' => null,
//        'script' => null,
//        'style' => null,
//        'meta' => null,
//        'attributes' => null,
//        'workflow' => null,
        'layout' => null,
        'position' => 0,
        'mode'  => Lavender::LAYOUT_APPEND
    ],

    'route' => [
        'controller' => null, //'Lavender\Cms\DefaultController',
        'action'     => null, //'getIndex',
        'layout'     => null, //'default',
        'workflow'   => null, //'default',
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
        'view' => '', //container html where payloads are injected
        'filters' => [], //bool callbacks run during each step
        'states' => [
            'my_step1' => [

                // filter callbacks
                'before_load' => [
                    // todo prepare fields
                    // todo inject defaults or session data
                ],

                // each payload is rendered into a form
                'payloads' => [
                    'my_custom_payload' => [
                        'my_custom_key' => [
                            'field_type' => 'some.key',//registered form field renderer & view
                            'validate' => ['some.key','another.key'],//registered validation objects (php and/or js)
                            'position' => null,
                            'group' => null,
                            'before_html' => null,
                            'after_html' => null,
                            'label' => null,
                            // todo more stuff...
                        ],
                        'my_custom_key1' => [
                            //...
                        ],
                    ],
                    'my_custom_payload1' => [
                        //...
                    ]
                ],

                // filter fields
                'before_save' => [],

                // filter fields
                'after_save' => [],

                // filter callbacks w/ payload object(s)
                'after_load' => [
                    // todo throw FieldException to display inline field error
                    // todo throw FormException to display payload error
                    // todo throw Exception to display page error
                ],

            ],
            'my_step2' => [
                //...
            ],
        ],



    ]


];
