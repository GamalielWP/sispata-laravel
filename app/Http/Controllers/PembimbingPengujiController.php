<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Yajra\Datatables\Datatables;

class PembimbingPengujiController extends Controller
{
    public function __construct()
    {
        $this->middleware('pembimbing-penguji');
    }

    public function yajraIndex()
    {
        $mhs = User::all();
        return Datatables::of($mhs)->addIndexColumn()->make(true);
    }

    public function pembimbing()
    {
        return view('dosen.pembimbing');
    }
}
