<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\Dosen;
use App\Mahasiswa;
use App\Registrasi;
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
        ->editColumn('nim', function($user){
            $mhs = Mahasiswa::where('user_id', $user->id)->first();

            $mhs->nim;
            return $mhs->nim; 
        })
        ->addColumn('title', function($user){
            $mhs = Mahasiswa::where('user_id', $user->id)->first();
            
            $sempro = Sempro::where('mhs_user_id', $mhs->user_id)->first();
            return $sempro->title;
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
                        <li><a href="'.$mhs->regis_form.'">'.$mhs->nim.'-form-pendaftaran.pdf</a></li>
                        <li><a href="'.$mhs->validity_sheet.'">'.$mhs->nim.'-form-lembar-pengesahan.pdf</a></li>
                        <li><a href="'.$mhs->ksm.'">'.$mhs->nim.'-KSM.pdf</a></li>
                        <li><a href="'.$mhs->temp_transcript.'">'.$mhs->nim.'-transkrip-nilai-sementara.pdf</a></li>
                        <li><a href="'.$mhs->thesis_proposal.'">'.$mhs->nim.'-proposal.pdf</a></li>
                    </ul>
                ';

                return $file;
            }
        })
        ->addColumn('status', function($user){
            $mhs = Sempro::where('mhs_user_id', $user->id)->first();

            if ($mhs->track != null) {

                $mhs->track;
                return $mhs->track;

            } else {

                $note = "Belum mendaftar";
                return $note;

            }
        })
        ->rawColumns(['nim', 'title', 'detail', 'file', 'status'])
        ->make(true);
    }

    public function yajraIndexRequest()
    {
        $user = Registrasi::where('role', 'mahasiswa')
                ->where('prodi', Auth::user()->prodi)
                ->where('status', null)->get();

        return Datatables::of($user)
        ->addColumn('action', function($user){
            $btn = '
                <a href="/gugus-tugas-request-accept/'.$user->id.'" class="fa fa-check btn-outline-success btn-sm">Terima</a>'
                ."|".
                '<a href="/gugus-tugas-request-decline/'.$user->id.'" class="fa fa-times btn-outline-danger btn-sm">Tolak</a>
            ';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function accept($id)
    {
        $regis = Registrasi::where('id', $id)->first();

        User::create([
            'name' => $regis->name,
            'email' => $regis->email,
            'phone_number' => $regis->phone_number,
            'prodi' => $regis->prodi,
            'pfp' => $regis->pfp,
            'role' => $regis->role,
            'password' => $regis->password
        ]);

        $user = User::where('email', $regis->email)->first();

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $regis->nim
        ]);

        Sempro::create([
            'mhs_user_id' => $user->id,
            'tiitle' => null
        ]);

        Registrasi::destroy($id);

        return back();
    }

    public function decline($id)
    {
        Registrasi::findOrFail($id)->update([
            'status' => "ditolak"
        ]);

        return back();
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
        $sempro = Sempro::where('mhs_user_id', $id)->first();

        if ($sempro->track == "Sedang diproses PENGUJI") {
            Sempro::where('mhs_user_id', $id)->update([
                'schedule' => $request->Schedule
            ]);
        } else {
            Sempro::where('mhs_user_id', $id)->update([
                'scope_id' => $request->Bidang,
                'track' => "Sedang diproses KELOMPOK KEAHLIAN"
            ]);
        }

        return redirect('/gugus-tugas-dashboard');
    }

    public function index()
    {
        $data = Auth::user();
        return view('gugusTugas.dashboard', compact('data'));
    }

    public function request()
    {
        $data = Auth::user();
        return view('gugusTugas.request', compact('data'));
    }

}
