<?php

namespace App\Http\Middleware;

use Closure;

class LandingPage
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
        if (session()->has('role')) {
            return back();
        }
        else {
            return $next($request);
        }
    }
}
