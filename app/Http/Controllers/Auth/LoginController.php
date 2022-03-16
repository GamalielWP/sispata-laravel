<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'mahasiswa':
                session(['role' => $role]);
                return '/mahasiswa';
                break;

            case 'gugus-tugas':
                session(['role' => $role]);
                return '/gugus-tugas';
                break;

            case 'kelompok-keahlian':
                session(['role' => $role]);
                return '/kelompok-keahlian';
                break;

            case 'pembimbing':
                session(['role' => $role]);
                return '/pembimbing';
                break;

            case 'penguji':
                session(['role' => $role]);
                return '/penguji';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
