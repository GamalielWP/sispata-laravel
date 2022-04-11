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

    public function update_file(Request $request, $id)
    {
        $validateData = $request->validate([
            'Form' => 'mimes:pdf',
            'KSM' => 'mimes:pdf',
            'Transkrip' => 'mimes:pdf',
            'Pengesahan' => 'mimes:pdf',
            'Proposal' => 'mimes:pdf'
        ]);

        $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();

        //form pendaftaran
        if ($request->hasFile('Form')) {

            $extFile = $validateData['Form']->getClientOriginalExtension();
            $namaFile = $mhs->user_id.'-'.$mhs->nim.'-Form-Pendaftaran'.".".$extFile;

            //hapus file sebelumnya
            if (File::exists('doc\user'.$namaFile)) {
                File::delete('doc\user'.$namaFile);
            }

            $path = $validateData['Form']->move('doc\user',$namaFile);
            
            //simpan file baru
            Mahasiswa::findOrFail($id)->update([
                'regis_form' => $path
            ]);

        }

        //ksm
        if ($request->hasFile('KSM')) {

            $extFile = $validateData['KSM']->getClientOriginalExtension();
            $namaFile = $mhs->user_id.'-'.$mhs->nim.'-Kartu-Studi-Mahasiswa'.".".$extFile;

            //hapus file sebelumnya
            if (File::exists('doc\user'.$namaFile)) {
                File::delete('doc\user'.$namaFile);
            }

            $path = $validateData['KSM']->move('doc\user',$namaFile);
            
            //simpan file baru
            Mahasiswa::findOrFail($id)->update([
                'ksm' => $path
            ]);

        }

        //transkrip nilai
        if ($request->hasFile('Transkrip')) {

            $extFile = $validateData['Transkrip']->getClientOriginalExtension();
            $namaFile = $mhs->user_id.'-'.$mhs->nim.'-Transkrip-Nilai-Sementara'.".".$extFile;

            //hapus file sebelumnya
            if (File::exists('doc\user'.$namaFile)) {
                File::delete('doc\user'.$namaFile);
            }

            $path = $validateData['Transkrip']->move('doc\user',$namaFile);
            
            //simpan file baru
            Mahasiswa::findOrFail($id)->update([
                'temp_transcript' => $path
            ]);

        }

        //lembar pengesahan
        if ($request->hasFile('Pengesahan')) {

            $extFile = $validateData['Pengesahan']->getClientOriginalExtension();
            $namaFile = $mhs->user_id.'-'.$mhs->nim.'-Lembar-Pengesahan'.".".$extFile;

            //hapus file sebelumnya
            if (File::exists('doc\user'.$namaFile)) {
                File::delete('doc\user'.$namaFile);
            }

            $path = $validateData['Pengesahan']->move('doc\user',$namaFile);
            
            //simpan file baru
            Mahasiswa::findOrFail($id)->update([
                'validity_sheet' => $path
            ]);

        }

        //proposal penelitian
        if ($request->hasFile('Proposal')) {

            $extFile = $validateData['Proposal']->getClientOriginalExtension();
            $namaFile = $mhs->user_id.'-'.$mhs->nim.'-Proposal-TA1'.".".$extFile;

            //hapus file sebelumnya
            if (File::exists('doc\user'.$namaFile)) {
                File::delete('doc\user'.$namaFile);
            }

            $path = $validateData['Proposal']->move('doc\user',$namaFile);
            
            //simpan file baru
            Mahasiswa::findOrFail($id)->update([
                'thesis_proposal' => $path
            ]);

        }

        return back()->with('pesan',"Data berhasil diubah.");
        
    }

    public function profile()
    {
        $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();
        return view('mahasiswa.profile', compact('mhs'));
    }

    public function update_profile(Request $request, $id)
    {
        if ($request->NewPass == null) {
            $validateData = $request->validate([
                'Email' => 'required',
                'PhoneNumber' => 'required|min:11',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg',
                'OldPassword' => 'required'
            ]);
        } else {
            $validateData = $request->validate([
                'Email' => 'required',
                'PhoneNumber' => 'required|min:11',
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
                if ($request->NewPass != null) {
                    User::where('id', $id)->update([
                        'password' => Hash::make($validateData['NewPassword'])
                    ]);
                }

            } else {
                return back();
            }
        } else {
            return back();
        }

        return back()->with('pesan',"Data berhasil diubah.");
    }

}
