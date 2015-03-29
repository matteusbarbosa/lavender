<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;
use Illuminate\Http\Request;

class ShipmentController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();

        $this->middleware('cart');
	}

    public function getIndex(Cart $cart)
    {
        // todo detect multiple shipments
        $number = 1;

        if(!$shipment = $cart->getShipment($number)){

            $shipment = entity('cart_shipment')->create([
                'number' => $number,
            ]);

            $cart_model = $cart->getCart();

            $cart_model->update([
                'shipments' => [$shipment]
            ]);

        }

        return redirect('cart/shipment/'.$shipment->number);
    }

    public function getShipment($number, Cart $cart)
    {
        if(!$shipment = $cart->getShipment($number)){

            // unknown shipment, start over
            return redirect('cart/shipment');

        }

        if(!$shipment->address){

            return redirect('cart/shipment/'.$shipment->number.'/address');

        }

        return view('cart.shipment');
    }

    public function getAddress($number, Cart $cart)
    {
        if(!$shipment = $cart->getShipment($number)){

            // unknown shipment, start over
            return redirect('cart/shipment');

        }

        return view('cart.shipment.address');
    }

    public function postShipment($number, Request $request)
    {
        if(!workflow('cart_shipment')->handle($request)){

            return redirect('cart/shipment/'.$number);

        }

        return redirect('checkout');
    }

    public function postAddress($number, Request $request)
    {
        if(!workflow('cart_shipment_address')->handle($request)){

            return redirect('cart/shipment/'.$number.'/address');

        }

        return redirect('checkout');
    }
}
