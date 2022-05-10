<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;
use Auth;
use App\Mahasiswa;
use App\Sempro;
use App\User;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('mahasiswa');
    }

    public function dashboard()
    {
        $mhs = Mahasiswa::where('id', Auth::user()->id)->first();
        $sempro = Sempro::where('mhs_user_id', Auth::user()->id)->first();
        $dosen1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $dosen2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $dosen3 = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        $jadwal = Carbon::parse($sempro->schedule)->translatedFormat('l, d F Y');

        return view('mahasiswa.dashboard', compact('mhs', 'sempro', 'dosen1', 'dosen2', 'dosen3', 'jadwal'));
    }

    public function file()
    {
        $dosen = Dosen::all();
        $sempro = Sempro::where('mhs_user_id', Auth::user()->id)->first();

        return view('mahasiswa.file', compact('dosen', 'sempro'));
    }

    public function update_file(Request $request, $id)
    {
        $validateData = $request->validate([
            'Judul' => 'min:20',
            'Form' => 'mimes:pdf|max:1000',
            'KSM' => 'mimes:pdf|max:1000',
            'Transkrip' => 'mimes:pdf|max:1000',
            'Pengesahan' => 'mimes:pdf|max:1000',
            'Proposal' => 'mimes:pdf|max:37000'
        ]);

        $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();

        Sempro::where('mhs_user_id', $id)->update([
            'title' => $request->Judul
        ]);

        if (Dosen::where('lecturer_code', $request->Pembimbing1)->first()) {
            if (Dosen::where('lecturer_code', $request->Pembimbing2)->first()) {

                Sempro::where('mhs_user_id', $id)->update([
                    'adviser1_code' => $request->Pembimbing1,
                    'adviser2_code' => $request->Pembimbing2
                ]);

            } else {
                return back()->with('error', "Data gagal diubah.");
            }
            
        } else {
            return back()->with('error', "Data gagal diubah.");
        }
        

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
            Mahasiswa::where('user_id', $id)->update([
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
            Mahasiswa::where('user_id', $id)->update([
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
            Mahasiswa::where('user_id', $id)->update([
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
            Mahasiswa::where('user_id', $id)->update([
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
            Mahasiswa::where('user_id', $id)->update([
                'thesis_proposal' => $path
            ]);

            Sempro::where('mhs_user_id', $id)->update([
                'track' => "Sedang diproses GUGUS TUGAS"
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
        if ($request->NewPassword == null) {
            $validateData = $request->validate([
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg',
                'OldPassword' => 'required'
            ]);
        } else {
            $validateData = $request->validate([
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
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
