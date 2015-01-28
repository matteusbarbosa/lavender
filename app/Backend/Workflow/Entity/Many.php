<?php
namespace Lavender\Backend\Workflow\Entity;

use Lavender\Support\Contracts\WorkflowContract;

class Many implements WorkflowContract
{

    public function states()
    {
        return [

            10 => 'edit',

        ];
    }

    public function template($state)
    {
        return 'workflow.form.container';
    }

    public function options($state)
    {
        return ['url' => \URL::to('backend/post/many_manager/'.$state)];
    }

    public function edit($params)
    {
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