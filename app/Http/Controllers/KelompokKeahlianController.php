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
        $data = Auth::user();
        return view('kelompokKeahlian.dashboard', compact('data'));
    }
}
