@extends('layouts.app-dataTables')

@section('sidebar')
    
    <li class="side-item"> <a href="/kelompok-keahlian-diajukan" class="nav-link {{'kelompok-keahlian-diajukan' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-clock-o"></i><span class="ms-2">Diajukan</span> </a> </li>
    <li class="side-item"> <a href="/kelompok-keahlian-diterima" class="nav-link {{'kelompok-keahlian-diterima' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-check-square-o"></i><span class="ms-2">Diterima</span> </a> </li>
    <li class="side-item"> <a href="/kelompok-keahlian-ditolak" class="nav-link {{'kelompok-keahlian-ditolak' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-times-circle-o"></i><span class="ms-2">Ditolak</span> </a> </li>
    <li class="side-item"> <a href="/kelompok-keahlian-account" class="nav-link {{'kelompok-keahlian-account' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Akun</span> </a> </li>
        
@endsection