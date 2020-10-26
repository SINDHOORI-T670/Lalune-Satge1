<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfBroker
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard='broker')
	{
		// dd("IFbroker");
	    if (Auth::guard('broker')->check()) {
            return redirect('broker/home');
        }
			return $next($request);
		
	}
}