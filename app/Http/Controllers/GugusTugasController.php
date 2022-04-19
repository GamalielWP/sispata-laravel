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
        $mhs = Mahasiswa::all();

        return Datatables::of($mhs)->addIndexColumn()
        ->editColumn('nim', function($mhs){
            if ($mhs->user->prodi == Auth::user()->prodi) {
                $mhs->nim;
                return $mhs->nim;
            }
        })
        ->addColumn('title', function($mhs){
            if ($mhs->user->prodi == Auth::user()->prodi) {
                $sempro = Sempro::where('mhs_user_id', $mhs->user_id)->first();
                return $sempro->title;
            } 
        })
        ->addColumn('name', function($mhs){
            if ($mhs->user->prodi == Auth::user()->prodi) {
                $mhs->user->name;
                return $mhs->user->name;
            } 
        })
        ->rawColumns(['nim', 'title', 'name'])
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
