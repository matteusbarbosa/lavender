<?php
namespace Lavender\Core\Database\Entity\Scope;

use Illuminate\Database\Eloquent\ScopeInterface;

class ConfigLayerScope implements ScopeInterface
{

    public function apply(Builder $builder) {
        $model = $builder->getModel();
        $builder->where($model->getTable().'.company_id','=',Auth::user()->company_id);
    }

    public function remove(Builder $builder) {
        // TODO: Implement remove() method.
    }

}