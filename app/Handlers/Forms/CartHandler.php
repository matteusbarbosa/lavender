<?php
namespace App\Handlers\Forms;

use App\Cart;
use App\Support\Facades\Message;
use App\Support\FormHandler;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;
use Lavender\Contracts\Entity;
use Lavender\Contracts\Form;

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

    public function add_cart_item()
    {
        $this->dispatchFrom(
            'App\Commands\Cart\AddToCart',
            $this->request,
            ['cart_id' => $this->cart->id]
        );

        Message::addSuccess("Product was added to your cart.");
    }

    public function update_cart_item()
    {
        $this->dispatchFrom(
            'App\Commands\Cart\UpdateCart',
            $this->request,
            ['cart_id' => $this->cart->id]
        );

        Message::addSuccess("Your cart has been updated.");
    }

    public function shipment_address()
    {
        $this->dispatchFrom(
            'App\Commands\Cart\ShipmentAddress',
            $this->request,
            // todo set correct shipment
            ['shipment' => $this->cart->getShipment(1)]
        );
    }

    public function shipment_method()
    {
        var_dump("TODO set current form request");
        dd($this->request->all());

        $this->dispatchFrom(
            'App\Commands\Cart\ShipmentMethod',
            $this->request,
            // todo set correct shipment
            ['shipment' => $this->cart->getShipment(1)]
        );
    }

    public function payment_method()
    {
        $this->dispatchFrom(
            'App\Commands\Cart\PaymentMethod',
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
            'App\Form\Cart\ItemAdd',
            'App\Handlers\Forms\CartHandler@add_cart_item'
        );
        $events->listen(
            'App\Form\Cart\ItemUpdate',
            'App\Handlers\Forms\CartHandler@update_cart_item'
        );
        $events->listen(
            'App\Form\Cart\Shipment\Address',
            'App\Handlers\Forms\CartHandler@shipment_address'
        );
        $events->listen(
            'App\Form\Cart\Shipment\Method',
            'App\Handlers\Forms\CartHandler@shipment_method'
        );
        $events->listen(
            'App\Form\Cart\Payment\Method',
            'App\Handlers\Forms\CartHandler@payment_method'
        );
        $events->listen(
            'App\Form\Cart\Review',
            'App\Handlers\Forms\CartHandler@place_order'
        );
    }

}