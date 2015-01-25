<?php
namespace Lavender\Cart\Handlers;

use Lavender\Support\Facades\Message;

class AddToCart
{
    public function handle($request)
    {
        try{
            // load product
            $request['product'] = entity('product')->find($request['product']);

            // set the current cart
            $request['cart'] = app('cart')->getCart();

            // create new cart item
            $cart_item = entity('cart_item')->fill($request);

            // save cart item
            $cart_item->save();

            Message::addSuccess(sprintf(
                "Product %s was added to cart id %s",
                $request['product']->name,
                $request['cart']->id
            ));

        } catch(\Exception $e){
            echo '<pre>';
            print_r($e->getMessage());
            die;
        }
    }
}