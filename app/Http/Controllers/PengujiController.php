<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PengujiController extends Controller
{
    public function __construct()
    {
        $this->middleware('penguji');
    }

    public function index()
    {
        $data = Auth::user();
        return view('penguji.dashboard', compact('data'));
    }
}
