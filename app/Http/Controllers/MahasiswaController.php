<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mahasiswa;
use App\User;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('mahasiswa');
    }

    public function dashboard()
    {
        $data = Auth::user();
        return view('mahasiswa.dashboard', compact('data'));
    }

    public function file()
    {
        $data = Auth::user();
        return view('mahasiswa.file', compact('data'));
    }

    public function profile()
    {
        $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();
        return view('mahasiswa.profile', compact('mhs'));
    }

    public function update_profile(Request $request, $id)
    {
        $validateData = $request->validate([
            'Email' => 'required',
            'Phone' => 'required|min:11'
        ]);

        User::where('id', $id)->update([
            'email' => $validateData['Email'],
            'phone_number' => $validateData['Phone']
        ]);

        return back()->withInput()->with('pesan',"Update Data Berhasil.");
    }

    public function update_pfp(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        if ($request->hasFile('FotoProfil')) {

            $extFile = $request->FotoProfil->getClientOriginalExtension();
            $namaFile = $user->id.'-'.$user->name.'-'.time().".".$extFile;
            $path = $request->FotoProfil->move('img\pfp',$namaFile);

            User::findOrFail($id)->update([
                'pfp' => $path
            ]);

            return redirect('/mahasiswa-profile');
        }
    }

    public function akun(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            $pwd = Hash::check($validateData['OldPass'], $user->password);
            if ($pwd) {

            } else {
                return back();
            }
        } else {
            return back();
        }
    }
}
