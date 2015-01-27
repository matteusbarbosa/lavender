<?php
namespace Lavender\Backend\Handlers\Entity;

use Lavender\Support\Facades\Tabs;
use Lavender\Support\Facades\Workflow;

class AddTabs
{
    public function handle($model)
    {
        Tabs::make('entity_manager')->add('general', [
            'content' => "General Information",
            'children' => [
                ['content' => Workflow::make('entity_manager')->with('entity', $model)],
            ]
        ]);

        foreach($model->getRelationships() as $relation => $config){

            //Workflow::make('relationship_manager')->with('entity', $model);


            Tabs::make('entity_manager')->add($relation, [
                'content' => $relation,
                'children' => [
                    //['content' => Workflow::make('entity_manager')->with('entity', $model)],
                ]
            ]);


        }

    }
}