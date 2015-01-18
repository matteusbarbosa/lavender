<?php

return [

    'default' => [

        // login page
        'customer/login' => [
            'layout' => 'customer.login'
        ],

        // forgot password page
        'customer/forgot_password' => [
            'layout' => 'customer.forgot_password',
        ],

        // logout action
        'customer/logout' => [
            'controller' => 'Lavender\Customer\Routing\CustomerController',
            'action'     => 'logout',
        ],

        // reset password
        'customer/reset_password/{token}' => [
            'controller' => 'Lavender\Customer\Routing\CustomerController',
            'action'     => 'resetPassword',
        ],

        // hide token in field and show reset password field
        'customer/reset_password' => [
            'controller' => 'Lavender\Customer\Routing\CustomerController',
            'action'     => 'doReset',
        ],

        // confirm registration
        'customer/confirm/{code}' => [
            'controller' => 'Lavender\Customer\Routing\CustomerController',
            'action'     => 'confirm',
        ],
    ],

];