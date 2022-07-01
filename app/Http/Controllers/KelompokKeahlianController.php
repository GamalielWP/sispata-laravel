<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\Dosen;
use App\KetuaKK;
use App\Mahasiswa;
use App\Score;
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
        ->addColumn('detail', function($sempro){
            $mhs = Mahasiswa::where('user_id', $sempro->mhs_user_id)->first();

            $btn = '
                <a href="/kelompok-keahlian-edit/'.$mhs->user_id.'" class="fa fa-pencil btn-outline-success btn-sm"></a>
            ';
            return $btn;
        })
        ->rawColumns(['nim', 'name', 'prodi', 'examiner_code', 'file', 'detail'])
        ->make(true);
    }

    public function edit($id)
    {
        $data = Auth::user();
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();
        $dosen = Dosen::all();
        $penguji = Dosen::where('lecturer_code', '!=', $sempro->adviser1_code)->where('lecturer_code', '!=', $sempro->adviser2_code)->get();

        return view('kelompokKeahlian.edit', compact('data', 'mhs', 'sempro', 'dosen', 'penguji'));
    }

    public function update(Request $request, $id)
    {
        if (Score::where('mhs_user_id', $id)->exists()) {
            Score::where('mhs_user_id', $id)->delete();
        }

        Sempro::where('mhs_user_id', $id)->update([
            'adviser1_code' => $request->Pembimbing1,
            'adviser2_code' => $request->Pembimbing2,
            'examiner_code' => $request->Penguji
        ]);

        if ($request->Penguji != null) {
            Sempro::where('mhs_user_id', $id)->update([
                'track' => "Sedang diproses PENGUJI"
            ]);
        }

        if ($request->Pembimbing1 != null) {
            $adviser1 = Dosen::where('lecturer_code', $request->Pembimbing1)->first();
            Score::create([
                'mhs_user_id' => $id,
                'dsn_user_id' => $adviser1->user_id
            ]);
        }

        if ($request->Pembimbing2 != null && $request->Pembimbing1 != $request->Pembimbing2) {
            $adviser2 = Dosen::where('lecturer_code', $request->Pembimbing2)->first();
            Score::create([
                'mhs_user_id' => $id,
                'dsn_user_id' => $adviser2->user_id
            ]);
        }

        if ($request->Penguji != null) {
            $examiner = Dosen::where('lecturer_code', $request->Penguji)->first();
            Score::create([
                'mhs_user_id' => $id,
                'dsn_user_id' => $examiner->user_id
            ]);
        }

        return redirect('/kelompok-keahlian-dashboard');
    }

    public function index()
    {
        $data = Auth::user();
        $ketua = KetuaKK::where('user_id', $data->id)->first();
        $keahlian = BidangKeahlian::where('id', $ketua->scope_id)->first();
        
        return view('kelompokKeahlian.dashboard', compact('data', 'ketua', 'keahlian'));
    }
}
