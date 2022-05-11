<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\Dosen;
use App\Mahasiswa;
use App\Sempro;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Auth;

class GugusTugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('dosen');
    }

    public function yajraIndex()
    {
        $user = User::where('role', 'mahasiswa')->where('prodi', Auth::user()->prodi)->get();

        return Datatables::of($user)
        ->addColumn('number', function($user){
            $mhs = Mahasiswa::where('user_id', $user->id)->first();
            
            if ($mhs) {
                $i = 0;
                $i++;
                return $i;
            }
        })
        ->editColumn('nim', function($user){
            $mhs = Mahasiswa::where('user_id', $user->id)->first();

            if ($mhs) {
                $mhs->nim;
                return $mhs->nim;
            }
        })
        ->addColumn('title', function($user){
            $mhs = Mahasiswa::where('user_id', $user->id)->first();
            
            if ($mhs) {
                $sempro = Sempro::where('mhs_user_id', $mhs->user_id)->first();
                return $sempro->title;
            }
        })
        ->addColumn('name', function($user){
            $mhs = Mahasiswa::where('user_id', $user->id)->first();
            
            if ($mhs) {
                $user->name;
                return $user->name;
            }
        })
        ->addColumn('detail', function($user){
            $btn = '
                <a href="/gugus-tugas-edit/'.$user->id.'" class="fa fa-pencil btn-success btn-sm"></a>
            ';
            return $btn;
        })
        ->addColumn('file', function($user){
            $mhs = Mahasiswa::where('user_id', $user->id)->first();

            if ($mhs->thesis_proposal != null) {
                $file = '
                    <ul>
                        <li><a href="'.$mhs->regis_form.'">18104010-form-pendaftaran.pdf</a></li>
                        <li><a href="'.$mhs->validity_sheet.'">18104010-form-lembar-pengesahan.pdf</a></li>
                        <li><a href="'.$mhs->ksm.'">18104010-KSM.pdf</a></li>
                        <li><a href="'.$mhs->temp_transcript.'">18104010-transkrip-nilai-sementara.pdf</a></li>
                        <li><a href="'.$mhs->thesis_proposal.'">18104010-proposal.pdf</a></li>
                    </ul>
                ';

                return $file;
            }   
        })
        ->addColumn('track', function($user){
            $mhs = Sempro::where('mhs_user_id', $user->id)->first();

            if ($mhs->track != null) {

                $mhs->track;
                return $mhs->track;

            } else {

                $note = "Belum mendaftar";
                return $note;

            }
        })
        ->rawColumns(['number', 'nim', 'title', 'name', 'detail', 'file', 'track'])
        ->make(true);
    }

    public function edit($id)
    {
        $data = Auth::user();
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();
        $bidang = BidangKeahlian::all();

        $dosen1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $dosen2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $dosen3 = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        return view('gugusTugas.edit', compact('data', 'mhs', 'sempro', 'bidang', 'dosen1', 'dosen2', 'dosen3'));
    }

    public function update(Request $request, $id)
    {
        Sempro::where('mhs_user_id', $id)->update([
            'scope_id' => $request->Bidang,
            'schedule' => $request->Schedule,
            'track' => "Sedang diproses KELOMPOK KEAHLIAN"
        ]);

        return redirect('/gugus-tugas-dashboard');
    }

    public function index()
    {
        $data = Auth::user();
        $bidang = BidangKeahlian::all();

        return view('gugusTugas.dashboard', compact('data', 'bidang'));
    }

}
