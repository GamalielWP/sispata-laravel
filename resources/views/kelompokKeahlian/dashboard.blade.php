@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ini Dashboard Kelompok Keahlian</h1>
        <h4>ID : {{$data->id}}</h4>
        <h4>Name : {{$data->name}}</h4>
        <h4>Email : {{$data->email}}</h4>
        <h4>Password : {{$data->password}}</h4>
        <h4>Phone : {{$data->phone_number}}</h4>
        <h4>Address : {{$data->address}}</h4>
    </div>
@endsection