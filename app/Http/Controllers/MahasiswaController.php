<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mahasiswa;
use App\User;
use File;
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
            'Phone' => 'required|min:11',
            'NewPass' => '',
            'OldPass' => 'required'
        ]);

        $user = User::where('id', $id)->first();

        if ($user) {

            $pwd = Hash::check($validateData['OldPass'], $user->password);
            if ($pwd) {

                //save identitas
                User::where('id', $id)->update([
                    'email' => $validateData['Email'],
                    'phone_number' => $validateData['Phone']
                ]);

                //cek upload foto profil tidak
                if ($request->hasFile('FotoProfil')) {

                    $extFile = $request->FotoProfil->getClientOriginalExtension();
                    $namaFile = $user->id.'-'.$user->role.".".$extFile;

                    //hapus foto profil sebelumnya
                    if (File::exists('img\pfp'.$namaFile)) {
                        File::delete('img\pfp'.$namaFile);
                    }

                    $path = $request->FotoProfil->move('img\pfp',$namaFile);
            
                    //simpan foto profil baru
                    User::findOrFail($id)->update([
                        'pfp' => $path
                    ]);

                }

                //save new password
                if ($request->NewPass != null) {
                    User::where('id', $id)->update([
                        'password' => Hash::make($validateData['NewPass'])
                    ]);
                }

            } else {
                return back();
            }
        } else {
            return back();
        }

        return back()->withInput()->with('pesan',"Update Data Berhasil.");
    }

}
