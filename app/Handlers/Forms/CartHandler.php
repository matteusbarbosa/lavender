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
     * @param $data
     */
    public function shipment_address()
    {
        $this->dispatchFrom(
            'App\Commands\Cart\ShipmentAddress',
            $this->request,
            // todo set correct shipment
            ['shipment' => $this->cart->getShipment(1)]
        );
    }

    /**
     * @param $data
     */
    public function shipment()
    {
        $this->dispatchFrom(
            'App\Commands\Cart\Shipment',
            $this->request,
            // todo set correct shipment
            ['shipment' => $this->cart->getShipment(1)]
        );
    }

    /**
     * @param $data
     */
    public function payment()
    {
        $this->dispatchFrom(
            'App\Commands\Cart\Payment',
            $this->request,
            // todo set correct payment
            [
                'payment' => $this->cart->getPayment(1),
                'amount' => $this->cart->getTotal(),
            ]
        );
    }

    /**
     * @param $data
     */
    public function place_order()
    {
        // todo collect payments

        $cart = $this->cart->getCart();

        $cart->status = 'pending';

        $cart->save();

        // todo find a better way
        \Session::set('cart.success', $cart->id);
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
        $events->listen(
            'App\Workflow\Forms\Cart\Shipment\Address',
            'App\Handlers\Forms\CartHandler@shipment_address'
        );
        $events->listen(
            'App\Workflow\Forms\Cart\Shipment',
            'App\Handlers\Forms\CartHandler@shipment'
        );
        $events->listen(
            'App\Workflow\Forms\Cart\Payment',
            'App\Handlers\Forms\CartHandler@payment'
        );
        $events->listen(
            'App\Workflow\Forms\Cart\Review',
            'App\Handlers\Forms\CartHandler@place_order'
        );
    }

}