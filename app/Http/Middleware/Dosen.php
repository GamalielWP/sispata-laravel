<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Dosen
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

            $pp = Auth::user()->role == "pembimbing-penguji";
            $kk = Auth::user()->role == "kelompok-keahlian";
            $gg = Auth::user()->role == "gugus-tugas";
            $kk_gg = Auth::user()->role == "kk-gg";

            if ($pp || $kk) {
                return $next($request);
            }
            elseif ($gg || $kk_gg) {
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
