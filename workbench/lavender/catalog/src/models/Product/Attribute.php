<?php

namespace Lavender\Catalog\Product;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Attribute extends Eloquent
{

    protected $table = 'attribute';
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany('Lavender\Catalog\Product');
    }

}
