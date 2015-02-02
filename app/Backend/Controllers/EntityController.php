<?php
namespace Lavender\Backend\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Lavender\Backend\Interfaces\ViewModelInterface;
use Lavender\Support\Facades\Message;
use Lavender\Support\Facades\Tabs;

class EntityController extends Controller
{

    /**
     * Manage entity table
     *
     * @param  string $entity
     * @return  mixed
     */
    public function loadTable($entity)
    {
        if($model = $this->validate($entity)){

            // todo get backend table attributes
            $attributes = $model->backendTable();

            $columns = [-1 => "id"] + array_keys($attributes);

            $headers = $this->tableHeaders($attributes);

            $rows = $model->all($columns);

            $table = Form::table($rows, $headers, 'backend.entity.form.table');

            return View::make('backend.manager.entity.table')
                ->with('entity', $entity)
                ->with('table', $table);

        }

        return Redirect::to('backend');
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
     * Manage entity form
     *
     * @param  string $entity
     * @param $id
     * @return mixed
     */
    public function loadForm($entity, $id)
    {
        if($model = $this->validate($entity, $id)){

            return View::make('backend.manager.entity.form')
                ->with('content', Tabs::make('entity_manager'))
                ->with('model', $model)
                ->with('entity', $entity);

        }

        Message::addError("Invalid entity '{$entity}' with id '{$id}'");

        return Redirect::back();
    }

    /**
     * @param $entity
     * @param null $id
     * @return ViewModelInterface
     */
    protected function validate($entity, $id = null)
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
