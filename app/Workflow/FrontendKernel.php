<?php
namespace App\Workflow;

use Lavender\Contracts\Workflow;

class FrontendKernel extends Kernel
{

    protected $forms = [

        'admin_login'               => 'App\Workflow\Forms\Admin\Login',
        'cart_item_add'             => 'App\Workflow\Forms\Cart\ItemAdd',
        'cart_item_update'          => 'App\Workflow\Forms\Cart\ItemUpdate',
        'shipment'                  => 'App\Workflow\Forms\Cart\Shipment',

        'contact'                   => 'App\Workflow\Forms\ContactForm',
        'customer_login'            => 'App\Workflow\Forms\Customer\Login',
        'customer_register'         => 'App\Workflow\Forms\Customer\Register',
        'customer_forgot_password'  => 'App\Workflow\Forms\Customer\ForgotPassword',
        'customer_reset_password'   => 'App\Workflow\Forms\Customer\ResetPassword',

    ];

    protected $handlers = [

        'App\Handlers\Forms\ContactFormHandler',
        'App\Handlers\Forms\Customer\AuthHandler',
        'App\Handlers\Forms\Admin\AuthHandler',
        'App\Handlers\Forms\CartHandler',

    ];

}