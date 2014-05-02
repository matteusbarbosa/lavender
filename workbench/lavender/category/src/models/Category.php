<?php namespace Lavender\Category;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent
{

    protected $table = 'category';


    public function products()
    {
        return $this->belongsToMany('Lavender\Product\Product');
    }


}