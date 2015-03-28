<?php
namespace App\Http\Middleware\Cart;

use App\Cart;
use App\Support\Facades\Message;

class HasShipment
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if(!$this->cart->hasShipment()){

            Message::setWarning('Shipment is required.');

            return redirect()->guest('cart');

        }

        return $next($request);
    }
}