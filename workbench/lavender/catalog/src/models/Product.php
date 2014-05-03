<?php

namespace Lavender\Catalog;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent
{

    protected $table = 'product';

    public function categories()
    {
        return $this->belongsToMany('Lavender\Catalog\Category');
    }

    public function attributes()
    {
        return $this->belongsToMany('Lavender\Catalog\Product\Attribute');
    }

}
