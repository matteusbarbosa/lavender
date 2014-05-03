<?php

namespace Lavender\Catalog\Product;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ProductAttribute extends Eloquent
{

    protected $table = 'attribute_product';
    public $timestamps = false;

}
