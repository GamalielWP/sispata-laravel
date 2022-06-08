<?php

namespace App\Http\Controllers;

use App\BatalSempro;
use App\Dosen;
use Illuminate\Http\Request;
use Auth;
use App\Mahasiswa;
use App\Sempro;
use App\User;
use File;
use PDF;
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
        $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();
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
        $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();

        return view('mahasiswa.file', compact('dosen', 'sempro', 'mhs'));
    }

    public function update_file(Request $request, $id)
    {
        $validateData = $request->validate([
            'Judul' => 'min:20',
            'Form' => 'required|mimes:pdf|max:1000',
            'KSM' => 'required|mimes:pdf|max:1000',
            'Transkrip' => 'required|mimes:pdf|max:1000',
            'Pengesahan' => 'required|mimes:pdf|max:1000',
            'Proposal' => 'required|mimes:pdf|max:37000'
        ]);

        $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();
        $sempro = Sempro::where('mhs_user_id', Auth::user()->id)->first();

        Sempro::where('mhs_user_id', $id)->update([
            'title' => $request->Judul,
            'schedule' => $request->Schedule
        ]);

        if ($sempro->adviser1_code == null && $sempro->adviser2_code == null) {
            Sempro::where('mhs_user_id', $id)->update([
                'adviser1_code' => $request->Pembimbing1,
                'adviser2_code' => $request->Pembimbing2
            ]);
        } else {
            Sempro::where('mhs_user_id', $id)->update([
                'adviser1_code' => $sempro->adviser1_code,
                'adviser2_code' => $sempro->adviser2_code
            ]);
        }
        

        //form pendaftaran
        if ($request->hasFile('Form')) {

            $extFile = $validateData['Form']->getClientOriginalExtension();
            $namaFile = $mhs->user_id.'-'.$mhs->nim.'-Form-Pendaftaran'.".".$extFile;

            //hapus file sebelumnya
            if (File::exists('doc/user/'.$namaFile)) {
                File::delete('doc/user/'.$namaFile);
            }

            $path = $validateData['Form']->move('doc/user',$namaFile);
            
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
            if (File::exists('doc/user/'.$namaFile)) {
                File::delete('doc/user/'.$namaFile);
            }

            $path = $validateData['KSM']->move('doc/user',$namaFile);
            
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
            if (File::exists('doc/user/'.$namaFile)) {
                File::delete('doc/user/'.$namaFile);
            }

            $path = $validateData['Transkrip']->move('doc/user',$namaFile);
            
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
            if (File::exists('doc/user/'.$namaFile)) {
                File::delete('doc/user/'.$namaFile);
            }

            $path = $validateData['Pengesahan']->move('doc/user',$namaFile);
            
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
            if (File::exists('doc/user/'.$namaFile)) {
                File::delete('doc/user/'.$namaFile);
            }

            $path = $validateData['Proposal']->move('doc/user',$namaFile);
            
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

    public function download($id)
    {
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $file = $mhs->user_id.'-'.$mhs->nim.'-Berita-Acara'.'.pdf';
        $pdf = PDF::loadView('mahasiswa.berita-acara', compact('mhs'));

        return $pdf->download($file);
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
                'Nim' => 'required|min:8',
                'Nama' => 'required|min:3',
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg'
            ]);
        } else {
            $validateData = $request->validate([
                'Nim' => 'required|min:8',
                'Nama' => 'required|min:3',
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg',
                'NewPassword' => 'required|min:8',
                'ConfirmPassword' => 'same:NewPassword',
                'OldPassword' => 'required'
            ]);
        }

        $user = User::where('id', $id)->first();

        //save identitas
        User::where('id', $id)->update([
            'name' => $validateData['Nama'],
            'email' => $validateData['Email'],
            'phone_number' => $validateData['PhoneNumber']
        ]);
        Mahasiswa::where('user_id', $id)->update([
            'nim' => $validateData['Nim']
        ]);

        //cek upload foto profil tidak
        if ($request->hasFile('ProfilePhotos')) {

            $extFile = $validateData['ProfilePhotos']->getClientOriginalExtension();
            $namaFile = $user->id.'-'.$user->role.".".$extFile;

            //hapus foto profil sebelumnya
            if (File::exists('img/pfp/'.$namaFile)) {
                File::delete('img/pfp/'.$namaFile);
            }

            $path = $validateData['ProfilePhotos']->move('img/pfp',$namaFile);
    
            //simpan foto profil baru
            User::findOrFail($id)->update([
                'pfp' => $path
            ]);
        }

        if ($request->NewPassword != null) {
            if ($user) {
                $pwd = Hash::check($request->OldPassword, $user->password);
                if ($pwd) {
                    //save new password
                    if ($request->NewPassword != null) {
                        User::where('id', $id)->update([
                            'password' => Hash::make($validateData['NewPassword'])
                        ]);
                    }
                } else {
                    return back()->with('error', "Data gagal diubah.");
                }
            }
        }

        return back()->with('pesan', "Data berhasil diubah.");
    }

    public function resetFile($id)
    {
        Mahasiswa::where('user_id', $id)->update([
            'regis_form' => null,
            'ksm' => null,
            'temp_transcript' => null,
            'validity_sheet' => null,
            'thesis_proposal' => null
        ]);

        Sempro::where('mhs_user_id', $id)->update([
            'title' => null,
            'scope_id' => null,
            'adviser1_code' => null,
            'adviser2_code' => null,
            'examiner_code' => null,
            'schedule' => null,
            'track' => null
        ]);

        BatalSempro::create([
            'user_id' => $id,
            'date' => Carbon::now()->format('Y-m-d'),
            'time' => Carbon::now()->format('H:i:s')
        ]);

        $mhs = Mahasiswa::where('user_id', $id)->first();

        $file = [
            'Form-Pendaftaran',
            'Kartu-Studi-Mahasiswa',
            'Lembar-Pengesahan',
            'Proposal-TA1',
            'Transkrip-Nilai-Sementara'
        ];

        //hapus berkas pendaftaran
        foreach ($file as $fl) {
            $namaFile = $mhs->user_id.'-'.$mhs->nim.'-'.$fl.'.pdf';
            if (File::exists('doc/user/'.$namaFile)) {
                File::delete('doc/user/'.$namaFile);
            }
        }

        return back()->with('pesan', "Pendaftaran berhasil dibatalkan.");
    }

}
