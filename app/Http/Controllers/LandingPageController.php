<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Mahasiswa;
use App\Registrasi;
use App\Score;
use App\Sempro;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    public function berita_acara($id = 14)
    {
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();

        $pembimbing1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $pembimbing2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $penguji = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        $jadwal = Carbon::parse($sempro->schedule)->translatedFormat('l, d F Y');
        $record = Score::where('mhs_user_id', $id);

        if ($record->exists()) {
            $score1 = Score::where('mhs_user_id', $id)->where('dsn_user_id', $pembimbing1->id)->first();
            $score2 = Score::where('mhs_user_id', $id)->where('dsn_user_id', $pembimbing2->id)->first();
            $score3 = Score::where('mhs_user_id', $id)->where('dsn_user_id', $penguji->id)->first();

            return view('mahasiswa.berita-acara', compact('mhs', 'sempro', 'pembimbing1', 'pembimbing2', 'penguji', 'jadwal', 'score1', 'score2', 'score3'));
        } else {
            return view('mahasiswa.berita-acara', compact('mhs', 'sempro', 'pembimbing1', 'pembimbing2', 'penguji', 'jadwal'));
        }
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
