<?php
namespace App\Workflow;

use Lavender\Workflow\Kernel as WorkflowKernel;

// todo split up kernels by controller
class Kernel extends WorkflowKernel
{

    protected $workflowTemplate = 'layouts.partials.form';

    protected $workflowForms = [

        /** Backend */
        'admin_login' => [
            10 => 'App\Workflow\Forms\Admin\Login',
        ],
        'edit_product' => [
            10 => 'App\Workflow\Forms\Backend\Entity\Product'
        ],
        'edit_product_categories' => [
            10 => 'App\Workflow\Forms\Backend\Entity\Product\Categories'
        ],
        'edit_category' => [
            10 => 'App\Workflow\Forms\Backend\Entity\Category'
        ],

        /** Frontend */
        'cart_item_add' => [
            10 => 'App\Workflow\Forms\Cart\ItemAdd',
        ],
        'cart_item_update' => [
            10 => 'App\Workflow\Forms\Cart\ItemUpdate',
        ],
        'contact' => [
            10 => 'App\Workflow\Forms\ContactForm'
        ],
        'new_customer' => [
            10 => 'App\Workflow\Forms\Customer\Register\CallToAction',
            20 => 'App\Workflow\Forms\Customer\Register\NewCustomer',
        ],
        'existing_customer' => [
            10 => 'App\Workflow\Forms\Customer\Login'
        ],
        'customer_forgot_password' => [
            10 => 'App\Workflow\Forms\Customer\ForgotPassword'
        ],
        'customer_reset_password' => [
            10 => 'App\Workflow\Forms\Customer\ResetPassword'
        ],

    ];

    protected $workflowHandlers = [

        'App\Workflow\Handlers\ContactFormHandler',

        'App\Workflow\Handlers\Customer\AuthHandler',

        'App\Workflow\Handlers\Admin\AuthHandler',

        'App\Workflow\Handlers\CartHandler',

        'App\Workflow\Handlers\BackendHandler',

    ];

    protected $workflowFields = [

        'label'     => 'App\Workflow\Fields\Html',
        'error'     => 'App\Workflow\Fields\Html',
        'comment'   => 'App\Workflow\Fields\Html',
        'button'    => 'App\Workflow\Fields\Html',
        'tree'      => 'App\Workflow\Fields\Tree',

        'checkbox'  => 'App\Workflow\Fields\Input',
        'radio'     => 'App\Workflow\Fields\Input',
        'file'      => 'App\Workflow\Fields\Input',
        'image'     => 'App\Workflow\Fields\Input',
        'text'      => 'App\Workflow\Fields\Input',
        'hidden'    => 'App\Workflow\Fields\Input',
        'email'     => 'App\Workflow\Fields\Input',
        'url'       => 'App\Workflow\Fields\Input',
        'number'    => 'App\Workflow\Fields\Input',
        'password'  => 'App\Workflow\Fields\Input',
        'textarea'  => 'App\Workflow\Fields\Input',
        'submit'    => 'App\Workflow\Fields\Input',
        'reset'     => 'App\Workflow\Fields\Input',

        'select'    => 'App\Workflow\Fields\Select@dropdown',

    ];

    protected $workflowResources = [

        'category_tree'     => 'App\Workflow\Resources\CategoryTree',
        'category_children'     => 'App\Workflow\Resources\CategoryTree@toChildren',

    ];

}