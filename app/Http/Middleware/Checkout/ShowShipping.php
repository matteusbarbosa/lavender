<?php
namespace App\Http\Middleware\Checkout;

use Closure;

class ShowShipping
{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $checkout = workflow('checkout');

        if(!$checkout->isCurrentForm('App\Workflow\Forms\Checkout\Shipping')){

            if ($request->ajax()){

                return response('Unauthorized.', 401);

            } else{

                $checkout->setCurrentForm('App\Workflow\Forms\Checkout\Shipping');

            }

        }

        return $next($request);
    }

}
