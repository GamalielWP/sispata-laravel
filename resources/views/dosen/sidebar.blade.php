@extends('layouts.app-dataTables')

@section('sidebar')
    
    <li class="side-item"> <a href="/pembimbing" class="nav-link {{'pembimbing' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-lightbulb-o"></i><span class="ms-2">Pembimbing</span> </a> </li>
    <li class="side-item"> <a href="#" class="nav-link {{'' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-id-badge"></i> <span class="ms-2">Penguji</span> </a> </li>
    <li class="side-item"> <a href="#" class="nav-link {{'' == request()->path() ? 'active' : 'text-white'}}"> <i class="fa fa-user"></i><span class="ms-2">Profile</span> </a> </li>
        
@endsection