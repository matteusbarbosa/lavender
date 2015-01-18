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
                'backend.renderer' => 'Lavender\Backend\Handlers\Entity\EditLink',
            ],
            'password' => [
                'label' => 'Password',
                'type' => Attribute::VARCHAR,
                'backend.table' => false,
            ],
            'confirmation_code' => [
                'label' => 'Confirmation Code',
                'type' => Attribute::VARCHAR,
                'backend.table' => false,
            ],
            'remember_token' => [
                'label' => 'Remember Token',
                'type' => Attribute::VARCHAR,
                'nullable' => true,
                'backend.table' => false,
            ],
            'confirmed' => [
                'label' => 'confirmed',
                'type' => Attribute::BOOL,
                'default' => false,
            ],
        ],
        'relationships' => [
            'workflows' => [
                'entity' => 'workflow.session',
                'type' => Relationship::HAS_MANY,
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
