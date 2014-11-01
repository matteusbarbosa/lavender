<?php
namespace Lavender\Core\Database\Entity;

use Lavender\Core\Database\Query\Builder as QueryBuilder;

class Resource
{


    /**
     * Create a new query builder instance.
     *
     * @param  \Lavender\Core\Database\Query\Builder  $query
     * @return void
     */
    public function __construct(QueryBuilder $query)
    {
        $this->query = $query;
    }



}