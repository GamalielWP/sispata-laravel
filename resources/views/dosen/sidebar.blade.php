@extends('layouts.app')

@section('sidebar')
    {{-- Role Pembimbing Penguji--}}
    @if ($data->role == 'pembimbing-penguji')
        <li class="side-item"> <a href="/dosen-pembimbing" class="nav-link {{'dosen-pembimbing' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
        <li class="side-item"> <a href="/dosen-penguji" class="nav-link {{'dosen-penguji' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i><span class="ms-2">Penguji</span> </a> </li>
        <li class="side-item"> <a href="/dosen-profile" class="nav-link {{'dosen-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>  
    @endif

    {{-- Role Gugus Tugas --}}
    @if ($data->role == 'gugus-tugas')
        {{-- Dosen Menu --}}
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse1">  
            Dosen
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{

        'dosen-pembimbing' == request()->path() ||
        'dosen-penguji' == request()->path()

        ? 'show' : ''}}" id="collapse1">

        <li class="side-item ml-4"> <a href="/dosen-pembimbing" class="nav-link {{'dosen-pembimbing' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
        <li class="side-item ml-4"> <a href="/dosen-penguji" class="nav-link {{'dosen-penguji' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i><span class="ms-2">Penguji</span> </a> </li>
    
        </div>

        {{-- Gugus Tugas Menu --}}
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">  
            Gugus Tugas
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{'gugus-tugas-dashboard' == request()->path() ? 'show' : ''}}" id="collapse2">
            <li class="side-item ml-4"> <a href="/gugus-tugas-dashboard" class="nav-link {{'gugus-tugas-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
        </div>

        <li class="side-item"> <a href="/dosen-profile" class="nav-link {{'dosen-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
    @endif
            
    {{-- Role Kelompok Keahlian --}}
    @if ($data->role == 'kelompok-keahlian')
        {{-- Dosen Menu --}}
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse1">  
            Dosen
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{

            'dosen-pembimbing' == request()->path() ||
            'dosen-penguji' == request()->path()

            ? 'show' : ''}}" id="collapse1">

            <li class="side-item ml-4"> <a href="/dosen-pembimbing" class="nav-link {{'dosen-pembimbing' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
            <li class="side-item ml-4"> <a href="/dosen-penguji" class="nav-link {{'dosen-penguji' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i><span class="ms-2">Penguji</span> </a> </li>
                
        </div>

        {{-- Kelompok Keahlian Menu --}}
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">  
            Kelompok Keahlian
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{'kelompok-keahlian-dashboard' == request()->path() ? 'show' : ''}}" id="collapse2">
            <li class="side-item ml-4"> <a href="/kelompok-keahlian-dashboard" class="nav-link {{'kelompok-keahlian-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
        </div>

        <li class="side-item"> <a href="/dosen-profile" class="nav-link {{'dosen-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
    @endif

    {{-- Role Kelompok Keahlian + Gugus Tugas --}}
    @if ($data->role == 'kk-gg')
        {{-- Dosen Menu --}}
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse1">  
            Dosen
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{

            'dosen-pembimbing' == request()->path() ||
            'dosen-penguji' == request()->path()

            ? 'show' : ''}}" id="collapse1">

            <li class="side-item ml-4"> <a href="/dosen-pembimbing" class="nav-link {{'dosen-pembimbing' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
            <li class="side-item ml-4"> <a href="/dosen-penguji" class="nav-link {{'dosen-penguji' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i><span class="ms-2">Penguji</span> </a> </li>     
        
        </div>

        {{-- Gugus Tugas Menu --}}
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">  
            Gugus Tugas
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{'gugus-tugas-dashboard' == request()->path() ? 'show' : ''}}" id="collapse2">
            <li class="side-item ml-4"> <a href="/gugus-tugas-dashboard" class="nav-link {{'gugus-tugas-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
        </div>

        {{-- Kelompok Keahlian Menu --}}
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapse3" aria-expanded="false" aria-controls="collapse23">  
            Kelompok Keahlian
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{'kelompok-keahlian-dashboard' == request()->path() ? 'show' : ''}}" id="collapse3">
            <li class="side-item ml-4"> <a href="/kelompok-keahlian-dashboard" class="nav-link {{'kelompok-keahlian-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
        </div>

        <li class="side-item"> <a href="/dosen-profile" class="nav-link {{'dosen-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
    @endif
@endsection