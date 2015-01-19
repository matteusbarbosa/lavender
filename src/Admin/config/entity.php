<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [

    'admin' => [
        'class' => 'Lavender\Admin\Database\Admin',
        'scope' => Scope::IS_GLOBAL,
        'timestamps' => true,
        'attributes' => [
            'username' => [
                'label' => 'Username',
                'type' => Attribute::VARCHAR,
                'unique' => true,
                'backend.renderer' => 'Lavender\Manager\Handlers\Entity\EditLink',
            ],
            'email' => [
                'label' => 'Email',
                'type' => Attribute::VARCHAR,
                'unique' => true,
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
