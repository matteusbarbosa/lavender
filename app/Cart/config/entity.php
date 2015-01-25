<?php

use Lavender\Support\Facades\Attribute;
use Lavender\Support\Facades\Relationship;
use Lavender\Support\Facades\Scope;

return [

    'cart' => [
        'class' => 'Lavender\Cart\Database\Cart',
        'scope' => Scope::IS_STORE,
        'timestamps' => true,
        'attributes' => [

        ],
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
        'class' => 'Lavender\Cart\Database\CartItem',
        'scope' => Scope::IS_STORE,
        'timestamps' => true,
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


    'customer' => [
        'relationships' => [

            'cart' => [
                'entity' => 'cart',
                'type' => Relationship::HAS_MANY,
            ],

        ],
    ],





];
