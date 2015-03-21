<?php
namespace App\Workflow;

use Lavender\Contracts\Workflow;

class BackendKernel extends Kernel
{

    protected $forms = [

        'admin_login'               => 'App\Workflow\Forms\Admin\Login',
        'edit_product'              => 'App\Workflow\Forms\Backend\Entity\Product',
        'edit_product_categories'   => 'App\Workflow\Forms\Backend\Entity\Product\Categories',
        'edit_category'             => 'App\Workflow\Forms\Backend\Entity\Category',
        'config_general'            => 'App\Workflow\Forms\Backend\Config\General',
        'config_account'            => 'App\Workflow\Forms\Backend\Config\Account',

    ];

    protected $handlers = [

        'App\Handlers\Forms\BackendHandler',

    ];

}