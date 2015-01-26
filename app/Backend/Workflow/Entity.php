<?php
namespace Lavender\Backend\Workflow;

use Lavender\Support\Contracts\WorkflowContract;
use Lavender\Support\Contracts\WorkflowInterface;

class Entity implements WorkflowContract
{

    public function states($workflow)
    {
        return [

            10 => 'edit',

        ];
    }

    public function options($workflow, $state, $view)
    {
        $baseUrl = \Config::get('store.workflow_base_url');

        return ['url' => \URL::to($baseUrl.'/'.$workflow.'/'.$state.'/'.$view->entity->getEntity().'/'.$view->entity->id)];
    }

    public function edit(WorkflowInterface $view)
    {
        //todo add support for relationships
        $fields = $this->loadBackendFields($view->entity);

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