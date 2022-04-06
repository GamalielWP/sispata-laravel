<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('landing');
    }

    public function landing()
    {
        return view('auth.login');
    }
}
