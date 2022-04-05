<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class KelompokKeahlianController extends Controller
{
    public function __construct()
    {
        $this->middleware('dosen');
    }

    public function index()
    {
        $data = Auth::user();
        return view('kelompokKeahlian.dashboard', compact('data'));
    }

    public function akun()
    {
        $data = Auth::user();
        return view('kelompokKeahlian.akun', compact('data'));
    }
}
