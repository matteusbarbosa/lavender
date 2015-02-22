<?php
namespace App\Workflow\Forms\Backend\Entity;

use Lavender\Support\Workflow;

class Pivot extends Workflow
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
        return ['url' => \URL::to('backend/post/pivot_manager/'.$state)];
    }

    public function fields($state, $params)
    {
        if($state == 'edit') return $this->edit($params);

        return [];
    }

    protected function edit($params)
    {
        $header = [];

        $headers = [];

        $rows = [];

        foreach($params['relation'] as $item){

            $column = [];

            $attributes = $item->backendTable();

            foreach($attributes as $key => $value){

                if(!$headers) $header[] = $item->backendLabel($key);

                $column[] = $item->backendValue($key);

            }

            $rows[] = $column;

            if(!$headers) $headers = $header;

        }

        $fields['relation'] = [
            'type' => 'table',
            'value' => [],
            'headers' => $headers,
            'values' => $rows,
        ];

        $fields['save'] = [
            'type' => 'button',
            'value' => 'Save',
            'options' => ['type' => 'submit'],
        ];

        return $fields;
    }




}