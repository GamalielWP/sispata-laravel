<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Registrasi;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        return view('auth.login');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nim' => ['required', 'numeric', 'min:8', 'unique:mahasiswas'],
            'Nama' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Phone' => ['required', 'numeric', 'min:11'],
            'Prodi' => ['required'],
            'NewPassword' => ['required', 'string', 'min:8'],
            'ConfirmPassword' => ['required', 'string', 'same:NewPassword']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Registrasi::create([
            'nim' => $data['Nim'],
            'name' => $data['Nama'],
            'email' => $data['Email'],
            'phone_number' => $data['Phone'],
            'prodi' => $data['Prodi'],
            'pfp' => "img/default-user.png",
            'role' => "mahasiswa",
            'password' => Hash::make($data['ConfirmPassword'])
        ]);
    }
}
