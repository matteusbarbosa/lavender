<?php namespace Lavender\Product;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent
{

    protected $table = 'product';


    public function categories()
    {
        return $this->belongsToMany('Lavender\Category\Category');
    }

}