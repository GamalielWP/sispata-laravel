<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Dosen;
use File;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('dosen');
    }

    public function yajraIndex()
    {
        $mhs = User::where('role', 'mahasiswa')->get();
        
        return Datatables::of($mhs)->addIndexColumn()->make(true);
    }

    public function pembimbing()
    {
        $data = Auth::user();
        return view('dosen.pembimbing', compact('data'));
    }

    public function penguji()
    {
        $data = Auth::user();
        return view('dosen.penguji', compact('data'));
    }

    public function profile()
    {
        $data = Auth::user();
        $dsn = Dosen::where('user_id', $data->id)->first();

        return view('dosen.profile', compact('data', 'dsn'));
    }

    public function update_profile(Request $request, $id)
    {
        if ($request->NewPassword == null) {
            $validateData = $request->validate([
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
                'Alamat' => 'required',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg',
                'OldPassword' => 'required'
            ]);
        } else {
            $validateData = $request->validate([
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
                'Alamat' => 'required',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg',
                'NewPassword' => 'required',
                'ConfirmPassword' => 'same:NewPassword',
                'OldPassword' => 'required'
            ]);
        }

        $user = User::where('id', $id)->first();

        if ($user) {

            $pwd = Hash::check($validateData['OldPassword'], $user->password);
            if ($pwd) {

                //save identitas
                User::where('id', $id)->update([
                    'email' => $validateData['Email'],
                    'phone_number' => $validateData['PhoneNumber']
                ]);

                // if ($request->Alamat != null) {
                    Dosen::where('user_id', $id)->update([
                        'address' => $request->Alamat
                    ]);
                // }

                //cek upload foto profil tidak
                if ($request->hasFile('ProfilePhotos')) {

                    $extFile = $validateData['ProfilePhotos']->getClientOriginalExtension();
                    $namaFile = $user->id.'-'.$user->role.".".$extFile;

                    //hapus foto profil sebelumnya
                    if (File::exists('img\pfp'.$namaFile)) {
                        File::delete('img\pfp'.$namaFile);
                    }

                    $path = $validateData['ProfilePhotos']->move('img\pfp',$namaFile);
            
                    //simpan foto profil baru
                    User::findOrFail($id)->update([
                        'pfp' => $path
                    ]);

                }

                //save new password
                if ($request->NewPassword != null) {
                    User::where('id', $id)->update([
                        'password' => Hash::make($validateData['NewPassword'])
                    ]);
                }

            } else {
                return back()->with('error', "Data gagal diubah.");
            }
        } else {
            return back()->with('error', "Data gagal diubah.");
        }

        return back()->with('pesan', "Data berhasil diubah.");
    }
}
