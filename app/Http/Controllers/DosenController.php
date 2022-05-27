<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Dosen;
use App\Mahasiswa;
use App\Sempro;
use File;
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
        ->editColumn('score', function($sempro){
            if ($sempro->adviser1_score != null) {
                $sempro->adviser1_score;
                return $sempro->adviser1_score;
            } else {
                $score = 0;
                return $score;
            }
        })
        ->addColumn('detail', function($user){
            $btn = '
                <a href="/dosen-pembimbing-1-edit/'.$user->id.'" class="fa fa-pencil btn-success btn-sm"></a>
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
        ->editColumn('score', function($sempro){
            if ($sempro->adviser2_score != null) {
                $sempro->adviser2_score;
                return $sempro->adviser2_score;
            } else {
                $score = 0;
                return $score;
            }
        })
        ->addColumn('detail', function($user){
            $btn = '
                <a href="/dosen-pembimbing-2-edit/'.$user->id.'" class="fa fa-pencil btn-success btn-sm"></a>
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
        ->editColumn('score', function($sempro){
            if ($sempro->examiner_score != null) {
                $sempro->examiner_score;
                return $sempro->examiner_score;
            } else {
                $score = 0;
                return $score;
            }
        })
        ->addColumn('detail', function($user){
            $btn = '
                <a href="/dosen-penguji-edit/'.$user->id.'" class="fa fa-pencil btn-success btn-sm"></a>
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

        return view('dosen.profile', compact('data', 'dsn'));
    }

    public function update_profile(Request $request, $id)
    {
        if ($request->NewPassword == null) {
            $validateData = $request->validate([
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
                'Alamat' => 'required',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg'
            ]);
        } else {
            $validateData = $request->validate([
                'Email' => 'required',
                'PhoneNumber' => 'numeric',
                'Alamat' => 'required',
                'ProfilePhotos' => 'image|mimes:jpg,png,jpeg',
                'NewPassword' => 'required|min:8',
                'ConfirmPassword' => 'same:NewPassword',
                'OldPassword' => 'required'
            ]);
        }

        $user = User::where('id', $id)->first();

        //save identitas
        User::where('id', $id)->update([
            'email' => $validateData['Email'],
            'phone_number' => $validateData['PhoneNumber']
        ]);

        //save alamat
        Dosen::where('user_id', $id)->update([
            'address' => $request->Alamat
        ]);

        //cek upload foto profil tidak
        if ($request->hasFile('ProfilePhotos')) {

            $extFile = $validateData['ProfilePhotos']->getClientOriginalExtension();
            $namaFile = $user->id.'-'.$user->role.".".$extFile;

            //hapus foto profil sebelumnya
            if (File::exists('img\pfp'.$namaFile)) {
                File::delete('img\pfp'.$namaFile);
            }

            $path = $validateData['ProfilePhotos']->move('img\pfp', $namaFile);
    
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

    public function editPembimbing1($id)
    {
        $data = Auth::user();
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();

        $dosen1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $dosen2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $dosen3 = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        return view('dosen.edit-pembimbing-1', compact('data', 'mhs', 'sempro', 'dosen1', 'dosen2', 'dosen3'));
    }
    public function editPembimbing2($id)
    {
        $data = Auth::user();
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();

        $dosen1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $dosen2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $dosen3 = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        return view('dosen.edit-pembimbing-2', compact('data', 'mhs', 'sempro', 'dosen1', 'dosen2', 'dosen3'));
    }
    public function editPenguji($id)
    {
        $data = Auth::user();
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $sempro = Sempro::where('mhs_user_id', $id)->first();

        $dosen1 = Dosen::where('lecturer_code', $sempro->adviser1_code)->first();
        $dosen2 = Dosen::where('lecturer_code', $sempro->adviser2_code)->first();
        $dosen3 = Dosen::where('lecturer_code', $sempro->examiner_code)->first();

        return view('dosen.edit-penguji', compact('data', 'mhs', 'sempro', 'dosen1', 'dosen2', 'dosen3'));
    }

    public function updatePembimbing1(Request $request, $id)
    {
        Sempro::where('mhs_user_id', $id)->update([
            'adviser1_score' => $request->Nilai
        ]);

        return redirect('/dosen-pembimbing-1');
    }

    public function cetak($id)
    {
        $mhs = Mahasiswa::where('user_id', $id)->first();
        $file = $mhs->user_id.'-'.$mhs->nim.'-Berita-Acara'.'.pdf';
        $pdf = PDF::loadView('mahasiswa.berita-acara', compact('mhs'));

        //hapus file sebelumnya
        if (File::exists('doc\user'.$file)) {
            File::delete('doc\user'.$file);
        }

        return $pdf->save('doc/user/'.$file)->stream($file);
    }

    public function updatePembimbing2(Request $request, $id)
    {
        Sempro::where('mhs_user_id', $id)->update([
            'adviser2_score' => $request->Nilai
        ]);

        return redirect('/dosen-pembimbing-2');
    }

    public function updatePenguji(Request $request, $id)
    {
        Sempro::where('mhs_user_id', $id)->update([
            'examiner_score' => $request->Nilai
        ]);

        return redirect('/dosen-penguji');
    }
}
