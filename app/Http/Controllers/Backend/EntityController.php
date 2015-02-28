<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controller\Backend;
use App\Support\Facades\Message;

class EntityController extends Backend
{

	public function __construct()
	{
        $this->loadLayout();
	}

	public function getEntity($entity, $id)
    {
        if($model = $this->validateEntity($entity, $id)){

            return view('backend.entity.view')
                ->with('model', $model)
                ->with('entity', $entity);

        }

        return redirect('backend');
    }

	public function getIndex($entity)
	{
        if($model = $this->validateEntity($entity)){

            $attributes = $model->backendTable();

            $columns =  array_keys($attributes);

            $headers = $this->tableHeaders($attributes);

            $rows = $model->all($columns);

            return view('backend.entity.list')
                ->with('entity', $entity)
                ->with('rows', $rows)
                ->with('headers', $headers);

        }

        return redirect('backend');
	}

    public function tableHeaders($attributes)
    {
        $labels = [];

        foreach($attributes as $attribute => $config){

            $labels[] = isset($config['label']) ? $config['label'] : $attribute;

        }

        return $labels;
    }

    /**
     * @param $entity
     * @param null $id
     * @return \Lavender\Contracts\Entity
     */
    protected function validateEntity($entity, $id = null)
    {
        if(app()->bound("entity.{$entity}")){

            $model = entity($entity);

            // passing < 1 will allow new entities
            if($id > 0) $model = $model->find($id);

            if($model) {

                return $model;

            } else {

                Message::addError("{$entity} not found in database for id '{$id}'.");

            }

        } else {

            Message::addError("Entity '{$entity}' not found.");

        }
    }

}