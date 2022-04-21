<?php

namespace App\Http\Controllers;

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
        ->rawColumns(['number', 'nim', 'title', 'name'])
        ->make(true);
    }

    public function index()
    {
        $data = Auth::user();
        return view('gugusTugas.dashboard', compact('data'));
    }

    public function penjadwalan()
    {
        $data = Auth::user();
        return view('gugusTugas.penjadwalan', compact('data'));
    }

}
