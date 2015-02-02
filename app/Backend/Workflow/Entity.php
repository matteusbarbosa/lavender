<?php
namespace Lavender\Backend\Workflow;

use Lavender\Support\Workflow;

class Entity extends Workflow
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

    public function options($state, $params)
    {
        $entity = $params['entity'];

        $post_url = "backend/entity_manager/{$state}/{$entity->getEntity()}/{$entity->id}";

        return ['url' => \URL::to($post_url)];
    }

    public function fields($state, $params)
    {
        if($state == 'edit'){

            return $this->loadBackendFields($params['entity']);

        }

        return [];
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

        foreach($entity->backendTable() as $field => $attribute){

            $fields[$field] = [
                'label' => $attribute['label'],
                'type' => $attribute['backend.input'],
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