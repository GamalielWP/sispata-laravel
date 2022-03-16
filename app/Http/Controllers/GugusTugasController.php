<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class GugusTugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('gugus-tugas');
    }

    public function index()
    {
        $data = Auth::user();
        return view('gugusTugas.dashboard', compact('data'));
    }
}
