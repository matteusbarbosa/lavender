<?php
namespace Lavender;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent
{

    protected $table = 'category';

    public $timestamps = false;


    public function products()
    {
        return $this->belongsToMany('Lavender\Product', 'category_product');
    }
}