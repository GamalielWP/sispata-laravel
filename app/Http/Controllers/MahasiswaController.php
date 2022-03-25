<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('mahasiswa');
    }

    public function index()
    {
        $data = Auth::user();
        return view('mahasiswa.dashboard', compact('data'));
    }

    public function file()
    {
        $data = Auth::user();
        return view('mahasiswa.file', compact('data'));
    }
}
