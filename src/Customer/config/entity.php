<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [

    'customer' => [
        'class' => 'Lavender\Customer\Database\Customer',
        'scope' => Scope::IS_STORE,
        'timestamps' => true,
        'attributes' => [
            'email' => [
                'label' => 'Email',
                'type' => Attribute::VARCHAR,
                'backend.renderer' => 'Lavender\Manager\Handlers\Entity\EditLink',
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
        'class' => 'Lavender\Customer\Database\Reminder',
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
