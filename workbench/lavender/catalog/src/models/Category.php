<?php namespace Lavender\Catalog;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent
{

    protected $table = 'category';


    public function products()
    {
        return $this->belongsToMany('Lavender\Catalog\Product');
    }


}