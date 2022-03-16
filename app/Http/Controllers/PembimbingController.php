<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PembimbingController extends Controller
{
    public function __construct()
    {
        $this->middleware('pembimbing');
    }

    public function index()
    {
        $data = Auth::user();
        return view('pembimbing.dashboard', compact('data'));
    }
}
