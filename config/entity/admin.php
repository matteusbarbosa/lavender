<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [

    'admin' => [
        'class' => 'App\Database\Admin',
        'scope' => Scope::IS_GLOBAL,
        'timestamps' => true,
        'attributes' => [
            'email' => [
                'label' => 'Email',
                'type' => Attribute::VARCHAR,
                'unique' => true,
                'backend.table' => true,
                'backend.renderer' => 'App\Handlers\Attributes\EditLink',
            ],
            'password' => [
                'label' => 'Password',
                'type' => Attribute::VARCHAR,
            ],
            'remember_token' => [
                'label' => 'Remember Token',
                'type' => Attribute::VARCHAR,
                'nullable' => true,
                'backend.table' => false,
            ],
        ],

    ],






];
