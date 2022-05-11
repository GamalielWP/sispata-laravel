<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\KetuaKK;
use App\Mahasiswa;
use App\Sempro;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Yajra\DataTables\DataTables;

class KelompokKeahlianController extends Controller
{
    public function __construct()
    {
        $this->middleware('dosen');
    }

    public function yajraIndex()
    {
        $kk = KetuaKK::where('user_id', Auth::user()->id)->first();
        $sempro = Sempro::where('scope_id', $kk->scope_id)->where('track', "Sedang diproses KELOMPOK KEAHLIAN");

        return DataTables::of($sempro)
        ->addColumn('number', function(){ 
            $i = 0;
            $i++;
            return $i; 
        })
        ->editColumn('nim', function($sempro){
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
        ->rawColumns(['number', 'nim', 'title', 'name', 'prodi', 'detail', 'file', 'track'])
        ->make(true);
    }

    public function index()
    {
        $data = Auth::user();
        $ketua = KetuaKK::where('user_id', $data->id)->first();
        $keahlian = BidangKeahlian::where('id', $ketua->scope_id)->first();
        
        return view('kelompokKeahlian.dashboard', compact('data', 'keahlian'));
    }

    public function akun()
    {
        $data = Auth::user();
        return view('kelompokKeahlian.akun', compact('data'));
    }
}
