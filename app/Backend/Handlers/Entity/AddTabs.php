<?php
namespace Lavender\Backend\Handlers\Entity;

use Lavender\Support\Facades\Tabs;
use Lavender\Support\Facades\Workflow;

class AddTabs
{
    public function handle($model)
    {
        $tabs = Tabs::make('entity_manager');

        $tabs->add('general', [
            'content' => "General Information",
            'children' => [
                ['content' => Workflow::make('entity_manager', ['entity' => $model])->render()],
            ]
        ]);

        foreach($model->getRelationships() as $relation => $config){

            $workflow = $config['type'].'_manager';

            $params = ['entity' => $model, 'config' => $config];

            $tabs->add('_'.$relation, [
                'content' => "Manage ".$relation,
                'children' => [
                    ['content' => Workflow::make($workflow, $params)->render()],
                ]
            ]);

        }

    }
}