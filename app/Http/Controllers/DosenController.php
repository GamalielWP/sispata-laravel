<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Dosen;
use App\KetuaKK;
use App\Mahasiswa;
use App\Score;
use App\Sempro;
use File;
use Illuminate\Support\Carbon;
use PDF;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('dosen');
    }

    public function yajraIndexPembimbing1()
    {
        $dosen = Dosen::where('user_id', Auth::user()->id)->first();
        $sempro = Sempro::where('adviser1_code', $dosen->lecturer_code);
        
        return Datatables::of($sempro)
        ->addColumn('nim', function($sempro){
            $mhs = Mahasiswa::where('user_id', $sempro->mhs_user_id)->first();
            
            $mhs->nim;
            return $mhs->nim;  
        })
        ->addColumn('name', function($sempro){
            $user = User::where('id', $sempro->mhs_user_id)->first();
            
            $user->name;
            return $user->name;
        })
        ->addColumn('prodi', function($sempro){
            $user = User::where('id', $sempro->mhs_user_id)->first();
            
            $user->prodi;
            return $user->prodi;
        })
        ->addColumn('file', function($sempro){
            $mhs = Mahasiswa::where('user_id', $sempro->mhs_user_id)->first();

            if ($mhs->thesis_proposal != null) {
                $file = '
                    <ul>
                        <li><a href="'.$mhs->thesis_proposal.'">'.$mhs->nim.'-proposal.pdf</a></li>
                    </ul>
                ';

                return $file;
            }   
        })
        ->editColumn('schedule', function($sempro){
            if ($sempro->schedule != null) {

                $jadwal = Carbon::parse($sempro->schedule)->translatedFormat('l, d F Y');
                return $jadwal;

            } else {
                return "Belum ditentukan";
            }
        })
        ->editColumn('score', function($sempro){
            if ($sempro->adviser1_score != null) {
                $score = Score::where('mhs_user_id', $sempro->mhs_user_id)->where('dsn_user_id', Auth::user()->id)->first();
                $nilai = $score->ide + $score->solusi + $score->analisa + $score->penulisan + $score->kemandirian_presentasi;
                return $nilai;
            } else {
                $score = "Belum dinilai";
                return $score;
            }
        })
        ->addColumn('detail', function($sempro){
            $mhs = Mahasiswa::where('user_id', $sempro->mhs_user_id)->first();

            $btn = '
                <a href="/dosen-pembimbing-1-edit/'.$mhs->user_id.'" class="fa fa-pencil btn-outline-success btn-sm"></a>
            ';
            return $btn;
        })
        ->rawColumns(['nim', 'name', 'prodi', 'file', 'detail'])
        ->make(true);
    }

    public function yajraIndexPembimbing2()
    {
        $dosen = Dosen::where('user_id', Auth::user()->id)->first();
        $sempro = Sempro::where('adviser1_code', '!=', $dosen->lecturer_code)->where('adviser2_code', $dosen->lecturer_code);
        
        return Datatables::of($sempro)
        ->addColumn('nim', function($sempro){
            $mhs = Mahasiswa::where('user_id', $sempro->mhs_user_id)->first();
            
            $mhs->nim;
            return $mhs->nim;  
        })
        ->addColumn('name', function($sempro){
            $user = User::where('id', $sempro->mhs_user_id)->first();
            
            $user->name;
            return $user->name;
        })
        ->addColumn('prodi', function($sempro){
            $user = User::where('id', $sempro->mhs_user_id)->first();
            
            $user->prodi;
            return $user->prodi;
        })
        ->addColumn('file', function($sempro){
            $mhs = Mahasiswa::where('user_id', $sempro->mhs_user_id)->first();

            if ($mhs->thesis_proposal != null) {
                $file = '
                    <ul>
                        <li><a href="'.$mhs->thesis_proposal.'">'.$mhs->nim.'-proposal.pdf</a></li>
                    </ul>
                ';

                return $file;
            }   
        })
        ->editColumn('schedule', function($sempro){
            if ($sempro->schedule != null) {

                $jadwal = Carbon::parse($sempro->schedule)->translatedFormat('l, d F Y');
                return $jadwal;

            } else {
                return "Belum ditentukan";
            }
        })
        ->editColumn('score', function($sempro){
            if ($sempro->adviser2_score != null) {
                $score = Score::where('mhs_user_id', $sempro->mhs_user_id)->where('dsn_user_id', Auth::user()->id)->first();
                $nilai = $score->ide + $score->solusi + $score->analisa + $score->penulisan + $score->kemandirian_presentasi;
                return $nilai;
            } else {
                $score = "Belum dinilai";
                return $score;
            }
        })
        ->addColumn('detail', function($sempro){
            $mhs = Mahasiswa::where('user_id', $sempro->mhs_user_id)->first();

            $btn = '
                <a href="/dosen-pembimbing-2-edit/'.$mhs->user_id.'" class="fa fa-pencil btn-outline-success btn-sm"></a>
            ';
            return $btn;
        })
        ->rawColumns(['nim', 'name', 'prodi', 'file', 'detail'])
        ->make(true);
    }

    public function yajraIndexPenguji()
    {
        $dosen = Dosen::where('user_id', Auth::user()->id)->first();
        $sempro = Sempro::where('examiner_code', $dosen->lecturer_code);
        
        return Datatables::of($sempro)
        ->addColumn('nim', function($sempro){
            $mhs = Mahasiswa::where('user_id', $sempro->mhs_user_id)->first();
            
            $mhs->nim;
            return $mhs->nim;  
        })
        ->addColumn('name', function($sempro){
            $user = User::where('id', $sempro->mhs_user_id)->first();
            
            $user->name;
            return $user->name;
        })
        ->addColumn('prodi', function($sempro){
            $user = User::where('id', $sempro->mhs_user_id)->first();
            
            $user->prodi;
            return $user->prodi;
        })
        ->addColumn('file', function($sempro){
            $mhs = Mahasiswa::where('user_id', $sempro->mhs_user_id)->first();

            if ($mhs->thesis_proposal != null) {
                $file = '
                    <ul>
                        <li><a href="'.$mhs->thesis_proposal.'">'.$mhs->nim.'-proposal.pdf</a></li>
                    </ul>
                ';

                return $file;
            }   
        })
        ->editColumn('schedule', function($sempro){
            if ($sempro->schedule != null) {

                $jadwal = Carbon::parse($sempro->schedule)->translatedFormat('l, d F Y');
                return $jadwal;

            } else {
                return "Belum ditentukan";
            }
        })
        ->editColumn('score', function($sempro){
            if ($sempro->examiner_score != null) {
                $score = Score::where('mhs_user_id', $sempro->mhs_user_id)->where('dsn_user_id', Auth::user()->id)->first();
                $nilai = $score->ide + $score->solusi + $score->analisa + $score->penulisan + $score->kemandirian_presentasi;
                return $nilai;
            } else {
                $score = "Belum dinilai";
                return $score;
            }
        })
        ->addColumn('detail', function($sempro){
            $btn = '
                <a href="/dosen-penguji-edit/'.$sempro->mhs_user_id.'" class="fa fa-pencil btn-outline-success btn-sm"></a>
            ';
            return $btn;
        })
        ->rawColumns(['nim', 'name', 'prodi', 'file', 'detail'])
        ->make(true);
    }

    public function pembimbing1()
    {
        $data = Auth::user();
        return view('dosen.pembimbing-1', compact('data'));
    }
    public function pembimbing2()
    {
        $data = Auth::user();
        return view('dosen.pembimbing-2', compact('data'));
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
        $kk = KetuaKK::where('user_id', $data->id)->first();
        $bidang = BidangKeahlian::all();

        return view('dosen.profile', compact('data', 'dsn', 'kk', 'bidang'));
    }

    public function update_profile(Request $request, $id)
    {
        if ($request->NewPassword == null) {
            $validateData = $request->validate([
                'Nama' => 'min:3',
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
                'Alamat' => 'required',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg',
                'Signature' => 'image|mimes:png'
            ]);
        } else {
            $validateData = $request->validate([
                'Nama' => 'min:3',
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
                'Alamat' => 'required',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg',
                'Signature' => 'image|mimes:png',
                'NewPassword' => 'required|min:8',
                'ConfirmPassword' => 'same:NewPassword',
                'OldPassword' => 'required'
            ]);
        }

        $user = User::where('id', $id)->first();

        //save kredensial user
        User::where('id', $id)->update([
            'name' => $validateData['Nama'],
            'email' => $validateData['Email'],
            'phone_number' => $validateData['PhoneNumber']
        ]);

        //save identitas user
        Dosen::where('user_id', $id)->update([
            'nik' => $request->Nik,
            'nidn' => $request->Nidn,
            'address' => $request->Alamat
        ]);

        if (Auth::user()->role == 'kelompok-keahlian' || Auth::user()->role == 'kk-gg') {
            KetuaKK::where('user_id', $id)->update([
                'scope_id' => $request->Bidang
            ]);
        }

        //cek upload foto profil tidak
        if ($request->hasFile('ProfilePhotos')) {

            $extFile = $validateData['ProfilePhotos']->getClientOriginalExtension();
            $namaFile = $user->id.'-'.$user->role.".".$extFile;

            //hapus foto profil sebelumnya
            if (File::exists('img/pfp/'.$namaFile)) {
                File::delete('img/pfp/'.$namaFile);
            }

            $path = $validateData['ProfilePhotos']->move('img/pfp', $namaFile);
    
            //simpan foto profil baru
            User::findOrFail($id)->update([
                'pfp' => $path
            ]);

        }

        $dosen = Dosen::where('user_id', $id)->first();

        //cek upload ttd tidak
        if ($request->hasFile('Signature')) {

            $extFile = $validateData['Signature']->getClientOriginalExtension();
            $namaFile = $user->id.'-'.$dosen->lecturer_code.".".$extFile;

            //hapus ttd sebelumnya
            if (File::exists('img/sig/'.$namaFile)) {
                File::delete('img/sig/'.$namaFile);
            }

            $path = $validateData['Signature']->move('img/sig', $namaFile);
    
            //simpan ttd baru
            Dosen::where('user_id', $id)->update([
                'signature' => $path
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

    public function editPembimbing1($id)
    {
        $data = Auth::user();
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();
        $score = Score::where('mhs_user_id', $id)->where('dsn_user_id', Auth::user()->id)->first();

        $dosen1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $dosen2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $dosen3 = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        return view('dosen.edit-pembimbing-1', compact('data', 'mhs', 'score', 'sempro', 'dosen1', 'dosen2', 'dosen3'));
    }
    public function editPembimbing2($id)
    {
        $data = Auth::user();
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();
        $score = Score::where('mhs_user_id', $id)->where('dsn_user_id', Auth::user()->id)->first();

        $dosen1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $dosen2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $dosen3 = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        return view('dosen.edit-pembimbing-2', compact('data', 'mhs', 'score', 'sempro', 'dosen1', 'dosen2', 'dosen3'));
    }
    public function editPenguji($id)
    {
        $data = Auth::user();
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();
        $score = Score::where('mhs_user_id', $id)->where('dsn_user_id', Auth::user()->id)->first();

        $dosen1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $dosen2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $dosen3 = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        return view('dosen.edit-penguji', compact('data', 'mhs', 'score', 'sempro', 'dosen1', 'dosen2', 'dosen3'));
    }

    public function updatePembimbing1(Request $request, $id)
    {
        $request->validate([
            'Judul' => 'min:20'
        ]);

        $score = Score::where('mhs_user_id', $id)->where('dsn_user_id', Auth::user()->id);

        if ($score->exists()) {
            $score->update([
                'ide' => $request->Ide,
                'solusi' => $request->Solusi,
                'analisa' => $request->Analisa,
                'penulisan' => $request->Penulisan,
                'kemandirian_presentasi' => $request->Kemandirian
            ]);

            $record = $score->first();
            Sempro::where('mhs_user_id', $id)->update([
                'adviser1_score' => $record->id
            ]);
        }
        
        Sempro::where('mhs_user_id', $id)->update([
            'title' => $request->Judul
        ]);

        return redirect('/dosen-pembimbing-1');
    }

    public function cetak($id)
    {
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();

        $pembimbing1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $pembimbing2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $penguji = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        $score1 = Score::where('mhs_user_id', $id)->where('dsn_user_id', $pembimbing1->id)->first();
        $score2 = Score::where('mhs_user_id', $id)->where('dsn_user_id', $pembimbing2->id)->first();
        $score3 = Score::where('mhs_user_id', $id)->where('dsn_user_id', $penguji->id)->first();

        $jadwal = Carbon::parse($sempro->schedule)->translatedFormat('l, d F Y');

        $file = $mhs->user_id.'-'.$mhs->nim.'-Berita-Acara'.'.pdf';

        $pdf = PDF::loadView('mahasiswa.berita-acara', compact('mhs', 'sempro', 'pembimbing1', 'pembimbing2', 'penguji', 'jadwal', 'score1', 'score2', 'score3'));

        Sempro::where('mhs_user_id', $id)->update([
            'news_doc' => 'doc/user/'.$file,
            'track' => "SELESAI"
        ]);

        //hapus file sebelumnya
        if (File::exists('doc/user/'.$file)) {
            File::delete('doc/user/'.$file);
        }

        return $pdf->save('doc/user/'.$file)->stream($file);
    }

    public function updatePembimbing2(Request $request, $id)
    {
        $score = Score::where('mhs_user_id', $id)->where('dsn_user_id', Auth::user()->id);

        if ($score->exists()) {
            $score->update([
                'ide' => $request->Ide,
                'solusi' => $request->Solusi,
                'analisa' => $request->Analisa,
                'penulisan' => $request->Penulisan,
                'kemandirian_presentasi' => $request->Kemandirian
            ]);

            $record = $score->first();
            Sempro::where('mhs_user_id', $id)->update([
                'adviser2_score' => $record->id
            ]);
        }

        return redirect('/dosen-pembimbing-2');
    }

    public function updatePenguji(Request $request, $id)
    {
        $score = Score::where('mhs_user_id', $id)->where('dsn_user_id', Auth::user()->id);

        if ($score->exists()) {
            $score->update([
                'ide' => $request->Ide,
                'solusi' => $request->Solusi,
                'analisa' => $request->Analisa,
                'penulisan' => $request->Penulisan,
                'kemandirian_presentasi' => $request->Presentasi
            ]);

            $record = $score->first();
            Sempro::where('mhs_user_id', $id)->update([
                'examiner_score' => $record->id
            ]);
        }

        return redirect('/dosen-penguji');
    }
}
