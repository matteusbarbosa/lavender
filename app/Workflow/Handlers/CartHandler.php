<?php
namespace App\Workflow\Handlers;

use App\Support\Facades\Message;
use Lavender\Contracts\Workflow;

class CartHandler
{

    /**
     * todo better validations (stock availability, customer group, etc)
     * @param $data
     */
    public function add_cart_item(Workflow $data)
    {
        $request = $data->request;

        try{
            // load and set product to the request
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

            dd($e->getMessage());

        }
    }

    /**
     * todo better validations (stock availability, customer group, etc)
     * @param $data
     */
    public function update_cart_item(Workflow $data)
    {
        $request = $data->request;

        try{
            // load the current cart
            $cart = app('cart')->getCart();

            if($cart_item = $cart->findItem($request['item_id'])){

                if($request['qty']){

                    $cart_item->update([
                        'qty' => $request['qty']
                    ]);

                } else {

                    $cart_item->delete();

                }

                Message::addSuccess(sprintf(
                    "Product %s was updated in cart id %s",
                    $cart_item->product->name,
                    $cart->id
                ));
            }

        } catch(\Exception $e){

            dd($e->getMessage());

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
            'App\Workflow\Forms\Cart\ItemAdd',
            'App\Workflow\Handlers\CartHandler@add_cart_item'
        );
        $events->listen(
            'App\Workflow\Forms\Cart\ItemUpdate',
            'App\Workflow\Handlers\CartHandler@update_cart_item'
        );
    }

}