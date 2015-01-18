<?php
namespace Lavender\Manager\Workflow;

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

    public function options($workflow, $state)
    {
        return [];
    }

    public function edit(WorkflowInterface $view)
    {
        if($view->entity->getEntity() == 'product'){

            return [

                'name' => [
                    'label' => 'Name',
                    'value' => $view->entity->name,
                    'type' => 'text',
                    'validate' => ['required'],
                ],

                'sku' => [
                    'label' => 'Sku',
                    'value' => $view->entity->sku,
                    'type' => 'text',
                    'validate' => ['required'],
                ],


            ];

        }


        return [

            'id' => [
                'label' => 'Todo',
                'value' => $view->entity->getEntity(),
                'type' => 'text',
                'validate' => ['required'],
            ],


        ];
    }



}