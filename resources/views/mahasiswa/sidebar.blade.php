@extends('layouts.app')

@section('sidebar')
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px; height:1000px; float:left">

        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{asset('img/fif.png')}}" width="20%" height="auto">
            <span class="fs-7 ml-1">Sistem Pendaftaran TA 1<br>Fakultas Informatika</span>
        </a>

        <span class="text-menu">Menu</span>
        
        <hr>
        <ul id="active-list" class="nav nav-pills flex-column mb-auto">
            <li class="side-item"> <a href="/mahasiswa-dashboard" class="nav-link {{'mahasiswa-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
            <li class="side-item"> <a href="/mahasiswa-file" class="nav-link {{'mahasiswa-file' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-file-text-o"></i> <span class="ms-2">File</span> </a> </li>
            <li class="side-item"> <a href="/mahasiswa-profile" class="nav-link {{'mahasiswa-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
        </ul>
        
    </div>
@endsection