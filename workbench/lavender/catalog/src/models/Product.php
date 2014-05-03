<?php

namespace Lavender\Catalog;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\DB;

class Product extends Eloquent
{

    protected $table = 'product';

    public function categories()
    {
        return $this->belongsToMany('Lavender\Catalog\Category');
    }

    public function attributes()
    {
        return DB::table('product')
            ->join('attribute_product', 'attribute_product.product_id', '=', 'product.id')
            ->join('attribute', 'attribute.id', '=', 'attribute_product.attribute_id')
            ->select('attribute_product.value', 'attribute.label')
            ->where('product.id', '=', $this->id)
            ->get();
    }

}
