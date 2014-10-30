<?php
namespace Lavender\Core\Database\Query;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Query\Builder as EloquentQueryBuilder;

class Builder extends EloquentQueryBuilder
{

    public function toSql($debug = false)
    {
        $sql = parent::toSql();
        return $sql;
    }

}