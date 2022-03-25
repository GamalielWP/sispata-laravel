@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px; float:left">

        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"></svg>
            <span class="fs-4">Menu</span>
        </a>
        <hr>
        <ul id="active-list" class="nav nav-pills flex-column mb-auto">
            <li class="side-item"> <a href="/mahasiswa-dashboard" class="nav-link {{'mahasiswa-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
            <li class="side-item"> <a href="/mahasiswa-file" class="nav-link {{'mahasiswa-file' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-file-text-o"></i> <span class="ms-2">File</span> </a> </li>
            <li class="side-item"> <a href="#" class="nav-link {{'' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
        </ul>
        
    </div>
    <div class="container-md py-4">
        @yield('menu')
    </div>
@endsection