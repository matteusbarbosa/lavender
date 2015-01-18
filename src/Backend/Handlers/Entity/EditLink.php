<?php
namespace Lavender\Backend\Handlers\Entity;

class EditLink
{
    public function render($entity, $key)
    {
        $url = \URL::to('backend/entity/'.$entity->getEntity().'/id/'.$entity->id);

        return \HTML::link($url, $entity->$key);
    }
}