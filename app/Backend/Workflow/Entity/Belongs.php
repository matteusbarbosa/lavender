<?php
namespace Lavender\Backend\Workflow\Entity;

use Lavender\Support\Workflow;

class Belongs extends Workflow
{
    public function states()
    {
        return [

            10 => 'edit',

        ];
    }

    public function options($state, $params)
    {
        return ['url' => \URL::to('backend/post/belongs_manager/'.$state)];
    }


    public function fields($state, $params)
    {
        if($state != 'edit') return [];

        $fields['todo'] = [
            'type' => 'button',
            'value' => 'todo belongs',
            'options' => ['type' => 'submit'],
        ];

        return $fields;
    }

}