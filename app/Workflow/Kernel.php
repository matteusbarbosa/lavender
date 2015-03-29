<?php
namespace App\Workflow;

use App\Support\Facades\Message;
use Lavender\Contracts\Workflow;
use Lavender\Workflow\Kernel as WorkflowKernel;

class Kernel extends WorkflowKernel
{
    protected $template = 'layouts.partials.form';


    protected $fields = [

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
        'list'      => 'App\Workflow\Fields\ListType@multiple',
        'radiolist' => 'App\Workflow\Fields\ListType@single',

    ];

    protected $resources = [

        'yesno'             => 'App\Workflow\Resources\YesNo',
        'category_tree'     => 'App\Workflow\Resources\CategoryTree',
        'category_children' => 'App\Workflow\Resources\CategoryTree@toChildren',
        'shipment_methods'  => 'App\Workflow\Resources\ShipmentMethods',
        'payment_methods'   => 'App\Workflow\Resources\PaymentMethods',

    ];


    public function register()
    {
        try{

            parent::register();

        } catch(\Exception $e){

            Message::addError($e->getMessage());

        }
    }

}