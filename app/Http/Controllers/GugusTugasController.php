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
        ->addColumn('scope', function($user){
            $sempro = Sempro::where('mhs_user_id', $user->id)->first();

            if ($sempro->scope_id != null) {

                $keahlian = BidangKeahlian::where('id', $sempro->scope_id)->first();
                $keahlian->scope;
                
                return $keahlian->scope;

            } else {
                $btn = '
                    <a href="" class="edit btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#scopeModal" data-bs-user="'.$user->id.'">Pilih</a>
                ';
                return $btn;
            }
        })
        ->addColumn('file', function($user){
            $mhs = Mahasiswa::where('user_id', $user->id)->first();
            
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
        })
        ->addColumn('track', function($user){
            $mhs = Sempro::where('mhs_user_id', $user->id)->first();
            $mhs->track;

            return $mhs->track;
        })
        ->rawColumns(['number', 'nim', 'title', 'name', 'scope', 'file', 'track'])
        ->make(true);
    }

    public function pilihBidang(Request $request, $id)
    {
        Sempro::where('mhs_user_id', $id)->update([
            'scope_id' => $request->bidang
        ]);

        return response()->json([ 'success' => true ]);
    }

    public function index()
    {
        $data = Auth::user();
        $bidang = BidangKeahlian::all();

        return view('gugusTugas.dashboard', compact('data', 'bidang'));
    }

    public function penjadwalan()
    {
        $data = Auth::user();
        return view('gugusTugas.penjadwalan', compact('data'));
    }

}
