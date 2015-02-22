<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [


    /**
     * Theme model
     * Used to describe themes, locales.
     */
    'theme' => [
        'class' =>  'App\Database\Theme',
        'scope' => Scope::IS_STORE,
        'attributes' => [
            'code' => [
                'label' => 'Code',
                'type' => Attribute::VARCHAR,
                'unique' => true,
                'backend.table' => true,
                'backend.renderer' => 'App\Handlers\Attributes\EditLink',
            ],
            'name' => [
                'label' => 'Name',
                'type' => Attribute::VARCHAR,
                'backend.table' => true,
                'backend.renderer' => 'App\Handlers\Attributes\EditLink',
            ],
        ],
        'relationships' => [
            'parent' => [
                'entity' => 'theme',
                'type' => Relationship::HAS_ONE,
            ],
        ],
    ],


];