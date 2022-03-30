@extends('layouts.app')

@section('sidebar')

    <li class="side-item"> <a href="/mahasiswa-dashboard" class="nav-link {{'mahasiswa-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
    <li class="side-item"> <a href="/mahasiswa-file" class="nav-link {{'mahasiswa-file' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-file-text-o"></i> <span class="ms-2">File</span> </a> </li>
    <li class="side-item"> <a href="/mahasiswa-profile" class="nav-link {{'mahasiswa-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>

@endsection