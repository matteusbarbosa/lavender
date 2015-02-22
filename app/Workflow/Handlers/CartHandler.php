<?php
namespace App\Workflow\Handlers;

use App\Support\Facades\Message;
use Lavender\Contracts\Workflow;

class CartHandler
{

    /**
     * @param $data
     */
    public function add_to_cart(Workflow $data)
    {
        $request = $data->request;

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

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Workflow\Forms\Cart\AddToCart',
            'App\Workflow\Handlers\CartHandler@add_to_cart'
        );
    }

}