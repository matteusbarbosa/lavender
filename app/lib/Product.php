<?php
namespace Lavender;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent
{

    protected $table = 'product';

    public $timestamps = false;

    //    public function categories()
    //    {
    //        return $this->belongsToMany('Lavender\Category', 'category_product');
    //    }

}