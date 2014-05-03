<?php

namespace Lavender\Pos\Cart;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Item extends Eloquent
{

    protected $table = 'cart_item';
    protected $fillable = array('cart_id', 'item_id');

    public function item()
    {
        return $this->belongsTo('Lavender\Pos\Item');
    }

}