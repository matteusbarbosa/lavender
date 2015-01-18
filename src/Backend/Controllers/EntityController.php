<?php
namespace Lavender\Backend\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Lavender\Backend\Interfaces\ViewModelInterface;
use Lavender\Support\Facades\Message;
use Lavender\Support\Facades\Workflow;

class EntityController extends Controller
{

    protected $form_layout = 'backend.entity.form';

    protected $table_layout = 'backend.entity.table';

    /**
     * Manage entity table
     *
     * @param  string $entity
     * @return  mixed
     */
    public function loadTable($entity)
    {
        if($model = $this->validate($entity)){

            $table = HTML::table($entity, 'entity')->with('entity', $model);

            return View::make($this->table_layout)
                ->with('entity', $entity)
                ->with('table', $table);

        }

        return Redirect::to('backend');
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

            $form = Workflow::make('entity_manager')->with('entity', $model);

            return View::make($this->form_layout)
                ->with('entity', $entity)
                ->with('form', $form);

        }

        return Redirect::to('backend');
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
