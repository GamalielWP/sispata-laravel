@extends('layouts.app-dataTables')

@section('sidebar')
    
    <li class="side-item"> <a href="/dosen-pembimbing" class="nav-link {{'dosen-pembimbing' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
    <li class="side-item"> <a href="/dosen-penguji" class="nav-link {{'dosen-penguji' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i> <span class="ms-2">Penguji</span> </a> </li>
    <li class="side-item"> <a href="/dosen-profile" class="nav-link {{'dosen-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
        
@endsection