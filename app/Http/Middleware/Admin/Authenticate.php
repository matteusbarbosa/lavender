<?php
namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate {


	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::admin()->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('admin/login');
			}
		}

        // Bind the Backend Kernel to our request
        app()->singleton(
            'Lavender\Contracts\Workflow\Kernel',
            'App\Workflow\BackendKernel'
        );

		return $next($request);
	}

}
