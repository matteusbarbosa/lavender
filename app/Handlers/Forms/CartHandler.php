<?php
namespace App\Handlers\Forms;

use App\Cart;
use App\Support\Facades\Message;
use App\Support\FormHandler;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;
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
     * @param Request $request
     */
    public function __construct(Cart $cart, Request $request)
    {
        $this->cart = $cart;

        $this->request = $request;
    }

    /**
     * @param $data
     */
    public function add_cart_item()
    {
        $this->dispatchFrom(
            'App\Commands\Cart\AddToCart',
            $this->request,
            ['cart_id' => $this->cart->id]
        );

        Message::addSuccess("Product was added to your cart.");
    }

    /**
     * @param $data
     */
    public function update_cart_item()
    {
        $this->dispatchFrom(
            'App\Commands\Cart\UpdateCart',
            $this->request,
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
            'App\Handlers\Forms\CartHandler@add_cart_item'
        );
        $events->listen(
            'App\Workflow\Forms\Cart\ItemUpdate',
            'App\Handlers\Forms\CartHandler@update_cart_item'
        );
    }

}