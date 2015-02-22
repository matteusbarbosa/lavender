<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [

    'admin' => [
        'class' => 'App\Database\Admin',
        'scope' => Scope::IS_GLOBAL,
        'attributes' => [
            'email' => [
                'label' => 'Email',
                'unique' => true,
            ],
            'password' => [
                'label' => 'Password',
            ],
            'remember_token' => [
                'label' => 'Remember Token',
                'nullable' => true,
            ],
        ],
    ],

    'cart' => [
        'class' => 'App\Database\Cart',
        'scope' => Scope::IS_STORE,
        'relationships' => [
            'customer' => [
                'entity' => 'customer',
                'type' => Relationship::BELONGS_TO,
            ],
            'items' => [
                'entity' => 'cart_item',
                'type' => Relationship::HAS_MANY,
            ],
        ],
    ],

    'cart_item' => [
        'class' => 'App\Database\Cart\Item',
        'scope' => Scope::IS_STORE,
        'attributes' => [
            'qty' => [
                'label' => 'Qty',
                'type' => 'number',
            ]
        ],
        'relationships' => [
            'product' => [
                'entity' => 'product',
                'type' => Relationship::BELONGS_TO,
            ],
            'cart' => [
                'entity' => 'cart',
                'type' => Relationship::BELONGS_TO,
            ],
        ],
    ],

    'category' => [
        'class' => 'App\Database\Category',
        'scope' => Scope::IS_DEPARTMENT,
        'attributes' => [
            'name' => [
                'label' => 'Name',
            ],
            'description' => [
                'label' => 'Description',
                'type' => Attribute::TEXT,
            ],
            'url' => [
                'label' => 'Url',
                'before_save' => 'App\Handlers\Attributes\Category\UrlKey'
            ],
        ],
        'relationships' => [
            'products' => [
                'entity' => 'product',
                'type' => Relationship::HAS_PIVOT,
                'table' => 'catalog_category_product',
            ],
            'parent' => [
                'entity' => 'category',
                'type' => Relationship::BELONGS_TO,
            ],
            'children' => [
                'entity' => 'category',
                'type' => Relationship::HAS_MANY,
            ],

        ],

    ],

    'customer' => [
        'class' => 'App\Database\Customer',
        'scope' => Scope::IS_STORE,
        'attributes' => [
            'email' => [
                'label' => 'Email',
                'backend.table' => true,
                'backend.renderer' => 'App\Handlers\Attributes\EditLink',
            ],
            'password' => [
                'label' => 'Password',
            ],
            'confirmation_code' => [
                'label' => 'Confirmation Code',
            ],
            'remember_token' => [
                'label' => 'Remember Token',
                'nullable' => true,
            ],
            'confirmed' => [
                'label' => 'confirmed',
                'type' => Attribute::BOOL,
                'default' => false,
            ],
        ],
        'relationships' => [
            'cart' => [
                'entity' => 'cart',
                'type' => Relationship::HAS_MANY,
            ],
        ],
    ],

    'reminder' => [
        'class' => 'App\Database\Reminder',
        'scope' => Scope::IS_STORE,
        'attributes' => [
            'email' => [
                'label' => 'Email',
            ],
            'token' => [
                'label' => 'Token',
            ],
            'created_at' => [
                'label' => 'Created At',
                'type' => Attribute::TIMESTAMP,
            ],
        ],
    ],

    'product' => [
        'class' => 'App\Database\Product',
        'scope' => Scope::IS_STORE,
        'attributes' => [
            'sku' => [
                'label' => 'Sku',
            ],
            'name' => [
                'label' => 'Name',
            ],
            'price' => [
                'label' => 'Price',
                'type' => Attribute::DECIMAL,
                'default' => 0.00,
            ],
            'url' => [
                'label' => 'Url',
                'before_save' => 'App\Handlers\Attributes\Product\UrlKey'
            ],
            'special_price' => [
                'label' => 'Special Price',
                'type' => Attribute::DECIMAL,
                'default' => 0.00,
            ],
        ],
        'relationships' => [
            'categories' => [
                'entity' => 'category',
                'type' => Relationship::HAS_PIVOT,
                'table' => 'catalog_category_product',
            ],
        ],
    ],

    'store' => [
        'class' => 'App\Database\Store',
        'attributes' => [
            'default' => [
                'label' => 'Default store',
                'type' => Attribute::BOOL,
            ],
        ],
        'relationships' => [
            'root_category' => [
                'entity' => 'category',
                'type' => Relationship::BELONGS_TO,
            ],
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

    'store.config' => [
        'class' => 'App\Database\Store\Config',
        'scope' => Scope::IS_STORE,
        'attributes' => [
            'key' => [
                'label' => 'Key',
            ],
            'value' => [
                'label' => 'Value',
            ],
        ],
        'relationships' => [
            'store' => [
                'entity' => 'store',
                'type' => Relationship::HAS_ONE,
            ],
        ],
    ],

    'theme' => [
        'class' =>  'App\Database\Theme',
        'scope' => Scope::IS_STORE,
        'attributes' => [
            'code' => [
                'label' => 'Code',
                'unique' => true,
            ],
            'name' => [
                'label' => 'Name',
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
