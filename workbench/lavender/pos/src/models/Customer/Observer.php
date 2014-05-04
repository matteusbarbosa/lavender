<?php

namespace Lavender\Pos\Customer;

use Lavender\Pos\Cart;

class Observer
{

    public function saving($model)
    {
        //
    }

    public function saved($model)
    {
        if(!Cart::where('user_id','=',$model->id)->count()){
            Cart::create([
                'user_id' => $model->id,
            ]);
        }
    }
}