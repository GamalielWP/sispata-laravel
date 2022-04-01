@extends('layouts.app-dataTables')

@section('sidebar')
    
    <li class="side-item"> <a href="/gugus-tugas-dashboard" class="nav-link {{'gugus-tugas-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
    <li class="side-item"> <a href="/gugus-tugas-account" class="nav-link {{'gugus-tugas-account' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Akun</span> </a> </li>
        
@endsection