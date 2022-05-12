<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\Dosen;
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
        $sempro = Sempro::where('scope_id', $kk->scope_id)->where('track', "Sedang diproses KELOMPOK KEAHLIAN")->orWhere('track', "Sedang diproses PENGUJI");

        return DataTables::of($sempro)
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
        ->editColumn('examiner_code', function($sempro){
            if ($sempro->examiner_code != null) {
                $dosen = Dosen::where('lecturer_code', $sempro->examiner_code)->first();
                $user = User::where('id', $dosen->user_id)->first();

                $user->name;
                return $user->name;
            } else {
                $note = "Belum ditentukan";
                return $note;
            }  
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
        ->addColumn('detail', function($user){
            $btn = '
                <a href="/kelompok-keahlian-edit/'.$user->id.'" class="fa fa-pencil btn-success btn-sm"></a>
            ';
            return $btn;
        })
        ->rawColumns(['nim', 'title', 'name', 'prodi', 'examiner_code', 'file', 'detail'])
        ->make(true);
    }

    public function edit($id)
    {
        $data = Auth::user();
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();
        $dosen = Dosen::all();

        return view('kelompokKeahlian.edit', compact('data', 'mhs', 'sempro', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        if ($request->Pembimbing1 != null &&
            Dosen::where('lecturer_code', $request->Pembimbing1)->first() &&
            Dosen::where('lecturer_code', $request->Pembimbing2)->first() &&
            Dosen::where('lecturer_code', $request->Penguji)->first()
        ) {
            $sempro = Sempro::where('mhs_user_id', $id)->first();

            if ($sempro->adviser2_code == $sempro->adviser1_code) {
                Sempro::where('mhs_user_id', $id)->update([
                    'adviser1_code' => $request->Pembimbing1,
                    'examiner_code' => $request->Penguji,
                    'track' => "Sedang diproses PENGUJI"
                ]);
            } else {
                Sempro::where('mhs_user_id', $id)->update([
                    'adviser1_code' => $request->Pembimbing1,
                    'adviser2_code' => $request->Pembimbing2,
                    'examiner_code' => $request->Penguji,
                    'track' => "Sedang diproses PENGUJI"
                ]);
            }

            return redirect('/kelompok-keahlian-dashboard');
        } else {
            return back()->with('error', "Data gagal diubah.");
        }
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
