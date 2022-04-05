<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Yajra\Datatables\Datatables;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('dosen');
    }

    public function yajraIndex()
    {
        $mhs = User::where('role', 'mahasiswa')->get();
        return Datatables::of($mhs)->addIndexColumn()->make(true);
    }

    public function pembimbing()
    {
        $data = Auth::user();
        return view('dosen.pembimbing', compact('data'));
    }

    public function penguji()
    {
        $data = Auth::user();
        return view('dosen.penguji', compact('data'));
    }

    public function profile()
    {
        $data = Auth::user();
        return view('dosen.profile', compact('data'));
    }
}
