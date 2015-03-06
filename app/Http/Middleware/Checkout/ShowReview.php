<?php
namespace App\Http\Middleware\Checkout;

use Closure;

class ShowReview
{


    /**
     * Handle an incoming request.
     * todo confirm shipping and payment info
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $checkout = workflow('checkout');

        if(!$checkout->isCurrentForm('App\Workflow\Forms\Checkout\Review')){

            if ($request->ajax()){

                return response('Unauthorized.', 401);

            } else{

                return redirect('checkout/shipping');

            }

        }

        return $next($request);
    }

}
