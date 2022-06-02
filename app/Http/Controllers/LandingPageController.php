<?php

namespace App\Http\Controllers;

use App\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LandingPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('landing');
    }

    public function landing()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'Nim' => ['required', 'numeric', 'min:8', 'unique:mahasiswas'],
            'Nama' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Phone' => ['required', 'numeric', 'min:11'],
            'Prodi' => ['required'],
            'NewPassword' => ['required', 'string', 'min:8'],
            'ConfirmPassword' => ['required', 'string', 'same:NewPassword']
        ]);

        Registrasi::create([
            'nim' => $request->Nim,
            'name' => $request->Nama,
            'email' => $request->Email,
            'phone_number' => $request->Phone,
            'prodi' => $request->Prodi,
            'pfp' => "img/default-user.png",
            'role' => "mahasiswa",
            'password' => Hash::make($request->ConfirmPassword)
        ]);

        return redirect('/');
    }
}
