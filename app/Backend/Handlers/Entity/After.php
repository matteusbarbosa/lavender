<?php
namespace Lavender\Backend\Handlers\Entity;

class After
{
    public function handle($request)
    {
        if($entity = entity($request['entity'])->find($request['id'])){

            $entity->fill($request);

            $entity->save();

        }
    }
}