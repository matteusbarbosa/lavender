<?php

namespace Lavender\Pos;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Item extends Eloquent
{

    protected $table = 'item';

    public function product()
    {
        return $this->belongsTo('Lavender\Catalog\Product');
    }

}