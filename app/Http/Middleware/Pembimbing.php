<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Pembimbing
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

            if (Auth::user()->role == "pembimbing") {
                return $next($request);
            }
            else {
                return back();
            }

        } else {
            return abort(403);
        }
    }
}
