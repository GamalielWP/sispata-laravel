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
                return '/mahasiswa-dashboard';
                break;

            case 'gugus-tugas':
                session(['role' => $role]);
                return '/gugus-tugas-dashboard';
                break;

            case 'kelompok-keahlian':
                session(['role' => $role]);
                return '/kelompok-keahlian-dashboard';
                break;

            case 'kk-gg':
                session(['role' => $role]);
                return '/kelompok-keahlian-dashboard';
                break;

            case 'pembimbing-penguji':
                session(['role' => $role]);
                return '/dosen-pembimbing';
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
