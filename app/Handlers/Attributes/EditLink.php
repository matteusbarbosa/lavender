<?php
namespace App\Handlers\Attributes;

use HTML;
use Lavender\Support\Contracts\EntityInterface;

class EditLink
{
    public function render(EntityInterface $entity, $key)
    {
        $url = url('backend/entity/'.$entity->getEntity().'/id/'.$entity->id);

        return HTML::link($url, $entity->$key);
    }
}