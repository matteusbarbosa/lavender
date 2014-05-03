<?php

namespace Lavender\Pos;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Cart extends Eloquent
{

    protected $table = 'cart';


    public function items()
    {
        return $this->hasMany('Lavender\Pos\Cart\Item');
    }
}