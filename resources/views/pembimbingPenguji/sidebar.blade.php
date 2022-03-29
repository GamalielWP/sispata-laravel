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
            <li class="side-item"> <a href="/pembimbing" class="nav-link {{'pembimbing' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
            <li class="side-item"> <a href="#" class="nav-link {{'' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i> <span class="ms-2">Penguji</span> </a> </li>
            <li class="side-item"> <a href="#" class="nav-link {{'' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
        </ul>
        
    </div>
@endsection