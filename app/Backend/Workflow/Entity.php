<?php
namespace Lavender\Backend\Workflow;

use Lavender\Support\Contracts\WorkflowContract;

class Entity implements WorkflowContract
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
        return ['url' => \URL::to('backend/post/entity_manager/'.$state)];
    }

    public function edit($params)
    {
        //todo add support for relationships
        $fields = $this->loadBackendFields($params['entity']);

        return $fields;
    }

    protected function loadBackendFields($entity)
    {
        $fields['id'] = [
            'type' => 'hidden',
            'value' => $entity->id,
        ];
        $fields['entity'] = [
            'type' => 'hidden',
            'value' => $entity->getEntity(),
        ];

        foreach($entity->getConfig('attributes') as $field => $attribute){

            $fields[$field] = [
                'label' => $attribute['label'],
                'type' => $attribute['backend.type'],
                'value' => $entity->$field,
                'validate' => $attribute['backend.validate'],
            ];

        }

        $fields['submit'] = [
            'type' => 'button',
            'value' => 'Save',
            'options' => ['type' => 'submit'],
        ];

        return $fields;
    }




}