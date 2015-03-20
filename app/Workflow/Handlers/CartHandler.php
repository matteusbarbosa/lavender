<?php
namespace App\Workflow\Handlers;

use App\Cart;
use App\Support\Facades\Message;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Lavender\Contracts\Entity;
use Lavender\Contracts\Workflow;

class CartHandler
{
    use DispatchesCommands;

    protected $cart;

    /**
     * Create a new command instance.
     *
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * @param $data
     */
    public function add_cart_item(Workflow $data)
    {
        $this->dispatchFrom(
            'App\Commands\Cart\AddToCart',
            $data->request,
            ['cart_id' => $this->cart->id]
        );

        Message::addSuccess("Product was added to your cart.");
    }

    /**
     * @param $data
     */
    public function update_cart_item(Workflow $data)
    {
        $this->dispatchFrom(
            'App\Commands\Cart\UpdateCart',
            $data->request,
            ['cart_id' => $this->cart->id]
        );

        Message::addSuccess("Your cart has been updated.");
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