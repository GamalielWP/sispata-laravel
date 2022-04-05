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

    public function akun()
    {
        return view('gugusTugas.akun');
    }
}
