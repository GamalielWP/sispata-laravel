<?php

namespace App\Http\Controllers;

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
        $mhs = User::where('role', 'mahasiswa')->where('prodi', Auth::user()->prodi)->where('track', 'gugus-tugas')->get();
        return Datatables::of($mhs)->addIndexColumn()->make(true);
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
