<?php
namespace Lavender\Core\Database\Query;

use Illuminate\Database\Query\Builder as QueryBuilder;

class Builder extends QueryBuilder
{

    public static $attribute_types = [
        'varchar' => 0,
        'text' => 1,
        'int' => 2,
        'decimal' => 3,
        'date' => 4,
    ];

}