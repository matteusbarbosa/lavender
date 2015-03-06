<?php
namespace App\Workflow\Handlers;

use Lavender\Contracts\Workflow;

class CheckoutHandler
{


    public function handle_shipping(Workflow $data)
    {
        //
    }

    public function handle_payment(Workflow $data)
    {
        //
    }

    public function handle_review(Workflow $data)
    {
        workflow('checkout')->reset();
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
            'App\Workflow\Forms\Checkout\Shipping',
            'App\Workflow\Handlers\CheckoutHandler@handle_shipping'
        );
        $events->listen(
            'App\Workflow\Forms\Checkout\Payment',
            'App\Workflow\Handlers\CheckoutHandler@handle_payment'
        );
        $events->listen(
            'App\Workflow\Forms\Checkout\Review',
            'App\Workflow\Handlers\CheckoutHandler@handle_review'
        );
    }

}