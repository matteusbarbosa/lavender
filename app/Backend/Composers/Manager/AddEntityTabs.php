<?php
namespace Lavender\Backend\Composers\Manager;

use Lavender\Support\Facades\Tabs;
use Lavender\Support\Facades\Workflow;

class AddEntityTabs
{
    public function compose($view)
    {
        $model = $view->model;

        $tabs = Tabs::make('entity_manager');

        $tabs->add('general', [
            'content' => "General Information",
            'children' => [
                ['content' => Workflow::make('entity_manager', ['entity' => $model])],
            ]
        ]);

        foreach($model->getRelationships() as $relation => $config){

            $workflow = $config['type'].'_manager';

            $params = ['relation' => $model->$relation, 'config' => $config];

            $tabs->add($relation, [
                'content' => "Manage ".$relation,
                'children' => [
                    ['content' => Workflow::make($workflow, $params)],
                ]
            ]);

        }

    }
}