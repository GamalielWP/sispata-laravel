<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\Dosen;
use App\KetuaKK;
use App\Mahasiswa;
use App\Registrasi;
use App\Sempro;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

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
                <a href="/gugus-tugas-edit/'.$user->id.'" class="fa fa-pencil btn-outline-success btn-sm"></a>
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
        $request->validate([
            'Judul' => 'min:20',
            'Nim' => 'required|min:8',
            'Nama' => 'required|min:3',
            'Email' => 'required',
            'PhoneNumber' => 'numeric'
        ]);

        $sempro = Sempro::where('mhs_user_id', $id)->first();

        if ($sempro->track == "Sedang diproses PENGUJI") {
            Sempro::where('mhs_user_id', $id)->update([
                'schedule' => $request->Schedule
            ]);
        } else {
            Sempro::where('mhs_user_id', $id)->update([
                'title' => $request->Judul,
                'scope_id' => $request->Bidang
            ]);

            if ($request->Bidang != null) {
                Sempro::where('mhs_user_id', $id)->update([
                    'track' => "Sedang diproses KELOMPOK KEAHLIAN"
                ]);
            } else {
                Sempro::where('mhs_user_id', $id)->update([
                    'track' => "Sedang diproses GUGUS TUGAS"
                ]);
            }

            Mahasiswa::where('user_id', $id)->update([
                'nim' => $request->Nim
            ]);

            User::where('id', $id)->update([
                'name' => $request->Nama,
                'email' => $request->Email,
                'phone_number' => $request->PhoneNumber
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

    public function listDosen()
    {
        $data = Auth::user();
        return view('gugusTugas.list-dosen', compact('data'));
    }

    public function yajraIndexDosen()
    {
        $user = User::where('role', '!=', 'mahasiswa')->where('prodi', Auth::user()->prodi)->get();

        return Datatables::of($user)
        ->addColumn('nidn', function($user){
            $dosen = Dosen::where('user_id', $user->id)->first();
            return $dosen->nidn;
        })
        ->addColumn('lecturer_code', function($user){
            $dosen = Dosen::where('user_id', $user->id)->first();
            return $dosen->lecturer_code;
        })
        ->addColumn('role', function($user){
            switch ($user->role) {
                case 'pembimbing-penguji':
                    $role = "Pembimbing - Penguji";
                    return $role;
                case 'gugus-tugas':
                    $role = "Gugus Tugas";
                    return $role;
                case 'kelompok-keahlian':
                    $role = "Ketua KK";
                    return $role;
                case 'kk-gg':
                    $role = "Ketua KK - Gugus Tugas";
                    return $role;
            }
        })
        ->addColumn('action', function($user){
            $btn = '
                <a href="/gugus-tugas-edit-dosen/'.$user->id.'" class="fa fa-pencil btn-outline-success btn-sm"></a>'
                ."|".
                '<a href="/gugus-tugas-delete-dosen/'.$user->id.'" class="fa fa-trash btn-outline-danger btn-sm"></a>
            ';
            return $btn;
        })
        ->rawColumns(['nidn', 'role', 'lecturer_code','action'])
        ->make(true);
    }

    public function addDosen(Request $request)
    {
        $request->validate([
            'nidn' => 'required|numeric|unique:dosens',
            'lecturer_code' => 'required|unique:dosens',
            'Nama' => 'required|min:3',
            'email' => 'required|unique:users',
            'Phone' => 'required|numeric|min:11',
            'Prodi' => 'required'
        ]);

        User::create([
            'name' => $request->Nama,
            'email' => $request->email,
            'phone_number' => $request->Phone,
            'prodi' => $request->Prodi,
            'pfp' => "img/default-user.png",
            'role' => "pembimbing-penguji",
            'password' => Hash::make($request->nidn)
        ]);

        $user = User::where('email', $request->email)->first();

        Dosen::create([
            'user_id' => $user->id,
            'nidn' => $request->nidn,
            'lecturer_code' => $request->lecturer_code,
            'address' => "Institut Teknologi Telkom Purwokerto Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147 (0281) 641629"
        ]);

        return redirect('/gugus-tugas-list-dosen')->with('pesan', "Data berhasil ditambahkan.");
    }

    public function editDosen($id)
    {
        $data = Auth::user();
        $dosen = Dosen::where('user_id', $id)->first();
        $prodi = ["S1-Rekayasa Perangkat Lunak", "S1-Informatika", "S1-Sistem Informasi", "S1-Sains Data"];

        return view('gugusTugas.edit-dosen', compact('data', 'dosen', 'prodi'));
    }

    public function updateDosen(Request $request, $id)
    {
        $request->validate([
            'nidn' => 'required|numeric',
            'lecturer_code' => 'required',
            'Nama' => 'required|min:3',
            'email' => 'required',
            'Phone' => 'required|numeric|min:11',
            'Prodi' => 'required',
            'Role' => 'required'
        ]);

        User::findOrFail($id)->update([
            'name' => $request->Nama,
            'email' => $request->email,
            'phone_number' => $request->Phone,
            'prodi' => $request->Prodi,
            'role' => $request->Role
        ]);

        Dosen::where('user_id', $id)->update([
            'nidn' => $request->nidn,
            'lecturer_code' => $request->lecturer_code,
        ]);

        $dosen = Dosen::where('user_id', $id)->first();
        $kk = KetuaKK::where('user_id', $id)->exists();

        if ($request->Role == 'kelompok-keahlian' || $request->Role == 'kk-gg') {
            if (!$kk) {
                KetuaKK::create([
                    'user_id' => $id,
                    'dosen_id' => $dosen->id,
                    'scope_id' => null
                ]);
            }
        } else {
            if ($kk) {
                KetuaKK::where('user_id', $id)->delete();
            }
        }

        //return sesuai role
        $user = User::where('id', Auth::user()->id)->first();

        switch ($user->role) {
            case 'gugus-tugas':
                return redirect('/gugus-tugas-list-dosen')->with('pesan', "Data berhasil diubah.");
                break;

            case 'kelompok-keahlian':
                return redirect('/kelompok-keahlian-dashboard')->with('pesan', "Data berhasil diubah.");
                break;

            case 'kk-gg':
                return redirect('/kelompok-keahlian-dashboard')->with('pesan', "Data berhasil diubah.");
                break;

            case 'pembimbing-penguji':
                return redirect('/dosen-pembimbing-1')->with('pesan', "Data berhasil diubah.");
                break;
        }
    }

    public function deleteDosen($id)
    {   $dosen = Dosen::where('user_id', $id)->first();

        Sempro::where('adviser1_code', $dosen->lecturer_code)
            ->orWhere('adviser2_code', $dosen->lecturer_code)
            ->orWhere('examiner_code', $dosen->lecturer_code)
            ->update([
                'adviser1_code' => null,
                'adviser2_code' => null,
                'examiner_code' => null
            ]);

        Dosen::where('user_id', $id)->delete();
        User::destroy($id);

        return back();
    }

}
