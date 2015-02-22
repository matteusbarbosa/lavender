<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [

    /**
     * Store model
     * Used to describe store relationships
     */
    'store' => [
        'class' => 'App\Database\Store',
        'attributes' => [
            'default' => [
                'label' => 'Default store',
                'type' => Attribute::BOOL,
            ],
        ],
        'relationships' => [
            'theme' => [
                'entity' => 'theme',
                'type' => Relationship::BELONGS_TO,
            ],
            'config' => [
                'entity' => 'store.config',
                'type' => Relationship::HAS_MANY,
            ],
        ],
    ],

    /**
     * Store config model
     * Used to describe store configurations
     */
    'store.config' => [
        'class' => 'App\Database\Store\Config',
        'scope' => Scope::IS_STORE,
        'attributes' => [
            'key' => [
                'label' => 'Key',
                'type' => Attribute::VARCHAR,
            ],
            'value' => [
                'label' => 'Value',
                'type' => Attribute::VARCHAR,
            ],
        ],
        'relationships' => [
            'store' => [
                'entity' => 'store',
                'type' => Relationship::HAS_ONE,
            ],
        ],
    ],


];