<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class CheckUser
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
        // return $next($request);
        if (! Auth::check()) {
            return redirect()->route('login');
        }
    
        if (Auth::user()->type == "Agent") {
            return redirect()->route('agent.Agent-Home');
        }
        else{
            return $next($request);
        } 
    }
}
