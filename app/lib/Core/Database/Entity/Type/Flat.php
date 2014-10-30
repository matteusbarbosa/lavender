<?php
namespace Lavender\Core\Database\Entity\Type;
use Lavender\Core\Database\Entity;

class Flat extends Entity
{

    public function findByAttribute($attribute, $value, $columns = array('*'))
    {
        return $this->where($attribute, '=', $value)->first($columns);
    }

}