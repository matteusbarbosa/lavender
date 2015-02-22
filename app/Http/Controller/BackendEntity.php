<?php
namespace App\Http\Controller;

use App\Events\Layout\LoadBackend;
use Lavender\Support\Contracts\EntityInterface;

abstract class BackendEntity extends Backend
{

    /**
     * @param $entity
     * @param null $id
     * @return EntityInterface
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

    public function tableHeaders(EntityInterface $entity, array $allowed)
    {
        $labels = [];

        $attributes = $entity->getConfig('attributes');

        foreach($allowed as $label => $attribute){

            // use label provided
            if(is_string($label)){

                $labels[] = $label;

            // use entity config label
            } elseif(isset($attributes[$attribute]['label'])){

                $labels[] =  $attributes[$attribute]['label'];

            // use the attribute code
            } else {

                $labels[] = $attribute;

            }

        }

        return $labels;
    }

}