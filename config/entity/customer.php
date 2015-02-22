<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [

    'customer' => [
        'class' => 'App\Database\Customer',
        'scope' => Scope::IS_STORE,
        'timestamps' => true,
        'attributes' => [
            'email' => [
                'label' => 'Email',
                'type' => Attribute::VARCHAR,
                'backend.table' => true,
                'backend.renderer' => 'App\Handlers\Attributes\EditLink',
            ],
            'password' => [
                'label' => 'Password',
                'type' => Attribute::VARCHAR,
            ],
            'confirmation_code' => [
                'label' => 'Confirmation Code',
                'type' => Attribute::VARCHAR,
            ],
            'remember_token' => [
                'label' => 'Remember Token',
                'type' => Attribute::VARCHAR,
                'nullable' => true,
            ],
            'confirmed' => [
                'label' => 'confirmed',
                'type' => Attribute::BOOL,
                'default' => false,
            ],
        ],
    ],

    'reminder' => [
        'class' => 'App\Database\Reminder',
        'scope' => Scope::IS_STORE,
        'timestamps' => true,
        'attributes' => [
            'email' => [
                'label' => 'Email',
                'type' => Attribute::VARCHAR,
            ],
            'token' => [
                'label' => 'Token',
                'type' => Attribute::VARCHAR,
            ],
            'created_at' => [
                'label' => 'Created At',
                'type' => Attribute::TIMESTAMP,
            ],
        ],
    ],






];
