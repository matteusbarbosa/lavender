<?php
namespace App\Workflow\Forms\Backend\Entity;

use Lavender\Support\Workflow;

class Many extends Workflow
{

    public function states()
    {
        return [

            10 => 'edit',

        ];
    }

    public function options($state, $params)
    {
        return ['url' => \URL::to('backend/post/many_manager/'.$state)];
    }

    public function fields($state, $params)
    {
        if($state != 'edit') return [];
        //todo add support for relationships
        //var_dump($params['entity']);

        $fields['todo'] = [
            'type' => 'button',
            'value' => 'todo many',
            'options' => ['type' => 'submit'],
        ];

        return $fields;
    }




}