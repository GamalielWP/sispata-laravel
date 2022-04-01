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
        return view('dosen.pembimbing');
    }

    public function penguji()
    {
        return view('dosen.penguji');
    }

    public function profile()
    {
        return view('dosen.profile');
    }
}
