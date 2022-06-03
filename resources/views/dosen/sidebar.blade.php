@extends('layouts.app')

@section('sidebar')
    {{-- Role Pembimbing Penguji--}}
    @if ($data->role == 'pembimbing-penguji')
        <li class="side-item"> <a href="/dosen-pembimbing-1" class="nav-link {{'dosen-pembimbing-1' == request()->path() || 'dosen-pembimbing-2' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
        <li class="side-item"> <a href="/dosen-penguji" class="nav-link {{'dosen-penguji' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i><span class="ms-2">Penguji</span> </a> </li>
        <li class="side-item"> <a href="/dosen-profile" class="nav-link {{'dosen-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>  
    @endif

    {{-- Role Gugus Tugas --}}
    @if ($data->role == 'gugus-tugas')
        {{-- Dosen Menu --}}
        <a class="nav-link text-white side-item" data-bs-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span class="ms-2">Dosen</span>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{

        'dosen-pembimbing-1' == request()->path() ||
        'dosen-pembimbing-2' == request()->path() ||
        'dosen-penguji' == request()->path()

        ? 'show' : ''}}" id="collapse1">

        <li class="side-item ml-4"> <a href="/dosen-pembimbing-1" class="nav-link {{'dosen-pembimbing-1' == request()->path() || 'dosen-pembimbing-2' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
        <li class="side-item ml-4"> <a href="/dosen-penguji" class="nav-link {{'dosen-penguji' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i><span class="ms-2">Penguji</span> </a> </li>
    
        </div>

        {{-- Gugus Tugas Menu --}}
        <a class="nav-link text-white side-item" data-bs-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
            <i class="fa fa-folder-open-o" aria-hidden="true"></i>
            <span class="ms-2">Gugus Tugas</span>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{

        'gugus-tugas-dashboard' == request()->path() ||
        'gugus-tugas-request' == request()->path() ||
        'gugus-tugas-list-dosen' == request()->path()

        ? 'show' : ''}}" id="collapse2">

            <li class="side-item ml-4"> <a href="/gugus-tugas-dashboard" class="nav-link {{'gugus-tugas-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
            <li class="side-item ml-4"> <a href="/gugus-tugas-request" class="nav-link {{'gugus-tugas-request' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-question-circle-o"></i><span class="ms-2">Request</span> </a> </li>
            <li class="side-item ml-4"> <a href="/gugus-tugas-list-dosen" class="nav-link {{'gugus-tugas-list-dosen' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-users"></i><span class="ms-2">Daftar Dosen</span> </a> </li>
        
        </div>

        <li class="side-item"> <a href="/dosen-profile" class="nav-link {{'dosen-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
    @endif
            
    {{-- Role Kelompok Keahlian --}}
    @if ($data->role == 'kelompok-keahlian')
        {{-- Dosen Menu --}}
        <a class="nav-link text-white side-item" data-bs-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span class="ms-2">Dosen</span>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{

            'dosen-pembimbing-1' == request()->path() ||
            'dosen-pembimbing-2' == request()->path() ||
            'dosen-penguji' == request()->path()

            ? 'show' : ''}}" id="collapse1">

            <li class="side-item ml-4"> <a href="/dosen-pembimbing-1" class="nav-link {{'dosen-pembimbing-1' == request()->path() || 'dosen-pembimbing-2' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
            <li class="side-item ml-4"> <a href="/dosen-penguji" class="nav-link {{'dosen-penguji' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i><span class="ms-2">Penguji</span> </a> </li>
                
        </div>

        {{-- Kelompok Keahlian Menu --}}
        <a class="nav-link text-white side-item" data-bs-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
            <i class="fa fa-code-fork" aria-hidden="true"></i>
            <span class="ms-2">Kelompok Keahlian</span>
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
        <a class="nav-link text-white side-item" data-bs-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span class="ms-2">Dosen</span>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{

            'dosen-pembimbing-1' == request()->path() ||
            'dosen-pembimbing-2' == request()->path() ||
            'dosen-penguji' == request()->path()

            ? 'show' : ''}}" id="collapse1">

            <li class="side-item ml-4"> <a href="/dosen-pembimbing-1" class="nav-link {{'dosen-pembimbing-1' == request()->path() || 'dosen-pembimbing-2' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
            <li class="side-item ml-4"> <a href="/dosen-penguji" class="nav-link {{'dosen-penguji' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i><span class="ms-2">Penguji</span> </a> </li>     
        
        </div>

        {{-- Gugus Tugas Menu --}}
        <a class="nav-link text-white side-item" data-bs-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
            <i class="fa fa-folder-open-o" aria-hidden="true"></i>
            <span class="ms-2">Gugus Tugas</span>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{
        'gugus-tugas-dashboard' == request()->path() ||
        'gugus-tugas-request' == request()->path() ||
        'gugus-tugas-list-dosen' == request()->path()
        
        ? 'show' : ''}}" id="collapse2">
        
            <li class="side-item ml-4"> <a href="/gugus-tugas-dashboard" class="nav-link {{'gugus-tugas-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
            <li class="side-item ml-4"> <a href="/gugus-tugas-request" class="nav-link {{'gugus-tugas-request' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-question-circle-o"></i><span class="ms-2">Request</span> </a> </li>
            <li class="side-item ml-4"> <a href="/gugus-tugas-list-dosen" class="nav-link {{'gugus-tugas-list-dosen' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-users"></i><span class="ms-2">Daftar Dosen</span> </a> </li>
        </div>

        {{-- Kelompok Keahlian Menu --}}
        <a class="nav-link text-white side-item" data-bs-toggle="collapse" href="#collapse3" aria-expanded="false" aria-controls="collapse23">
            <i class="fa fa-code-fork" aria-hidden="true"></i>
            <span class="ms-2">Kelompok Keahlian</span>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
        <div class="collapse {{'kelompok-keahlian-dashboard' == request()->path() ? 'show' : ''}}" id="collapse3">
            <li class="side-item ml-4"> <a href="/kelompok-keahlian-dashboard" class="nav-link {{'kelompok-keahlian-dashboard' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
        </div>

        <li class="side-item"> <a href="/dosen-profile" class="nav-link {{'dosen-profile' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
    @endif
@endsection