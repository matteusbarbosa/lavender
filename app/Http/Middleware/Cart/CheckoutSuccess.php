<?php
namespace App\Http\Middleware\Cart;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckoutSuccess
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
        if(!Session::get('order', false)){

            if ($request->ajax()){

                return response('Unauthorized.', 401);

            } else{

                return redirect()->guest('cart');

            }

        }

        return $next($request);
    }

}
