<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class KelompokKeahlianController extends Controller
{
    public function __construct()
    {
        $this->middleware('kelompok-keahlian');
    }

    public function index()
    {
        return view('kelompokKeahlian.diajukan');
    }

    public function diterima()
    {
        return view('kelompokKeahlian.diterima');
    }

    public function ditolak()
    {
        return view('kelompokKeahlian.ditolak');
    }

    public function akun()
    {
        return view('kelompokKeahlian.akun');
    }
}
