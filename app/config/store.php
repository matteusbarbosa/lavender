<?php

return [

    'default' => [

        /**
         * General
         */
        'name' => 'lavender store',
        'logo' => 'images/logo.svg',
        'email' => 'support@lavendercommerce.com',
        'phone' => '215 555 1212',
        'address' => "123 Ecommerce Ave\nPhiladelphia, PA 19101",
        'hours' => "9am-5pm Monday-Friday\n10am-3pm Sat & Sun",



        /**
         * Catalog
         */
        'category_url' => 'catalog/category',
        'product_url' => 'catalog/product',
        'product_count' => 5,



        /**
         * Account
         */
        // registration options
        'signup_email' => true, // send email on signup?
        'signup_confirm' => true, // user must be confirmed?

        // login throttling
        // todo options per auth type
        'login_cache_field' => 'email', // throttle login by this field
        'throttle_limit' => 9, // number of failed attempts
        'throttle_time_period' => 2, // seconds; concurrent requests must be under this limit

        // passwords
        'password_reset_expiration' => 7, // hours

        // account emails
        'email_reset_password' =>       'emails.passwordreset', // with $user and $token.
        'email_account_confirmation' => 'emails.confirm', // with $user



        /**
         * Workflows
         */
        'workflow_base_url' => 'workflow',



        /**
         * Advanced (changing these values could break lavender)
         */

        /**
         * Multisite: Add store scope to lavender entities
         */
        'multisite' => true,

        /**
         * Message Types: are used to create and display global messages
         * throughout the application. By default, these are displayed
         * in the layouts.elements.messages template by MessageComposer
         * ex: Message::addSuccess("foo")
         * echo Message::getSuccess() //foo
         */
        'message_types' => ['success', 'notice', 'warning', 'error'],
    ],
];
