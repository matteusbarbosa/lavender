<?php
namespace App\Commands\Cart;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class PaymentMethod extends Command implements SelfHandling
{

    /**
     * Create a new instance.
     */
    public function __construct($payment, $method, $amount)
    {
        $this->method   = $method;

        $this->payment  = $payment;

        $this->amount  = $amount;
    }

    /**
     * Execute the command.
     */
    public function handle()
    {
        $this->payment->update([
            'method' => $this->method,
            'total' => $this->amount,
        ]);
    }

}
