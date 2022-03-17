<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PembimbingPengujiController extends Controller
{
    public function __construct()
    {
        $this->middleware('pembimbing-penguji');
    }

    public function index()
    {
        $data = Auth::user();
        return view('pembimbingPenguji.dashboard', compact('data'));
    }
}
