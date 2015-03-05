<?php
namespace App\Http\Middleware\Cart;

class RedirectIfEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if(!app('cart')->getItemsCount()){

            return redirect()->guest('cart/empty');

        }

        return $next($request);
    }
}