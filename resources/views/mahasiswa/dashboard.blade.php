@extends('mahasiswa.sidebar')

@section('content')

<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-body">
              <img src="{{asset($mhs->user->pfp)}}" style="width: 10%; height: auto; float:left; padding-bottom:0.5%" alt="Foto Profil" class="mr-2">
              <h5 class="card-title">{{$sempro->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$mhs->nim}} - {{$mhs->user->name}} <b style="color: {{$mhs->thesis_proposal != null ? 'green' : 'red'}}">&nbsp;&nbsp;{{$mhs->thesis_proposal != null ? 'Terdaftar' : 'Belum Terdaftar'}}</b></h6>
              <p class="card-text">
                <i class="fa fa-envelope-o mr-3" aria-hidden="true"> {{$mhs->user->email}}</i>
                <i class="fa fa-phone mr-3" aria-hidden="true"> {{$mhs->user->phone_number}}</i>
                <i class="fa fa-graduation-cap" aria-hidden="true"> {{$mhs->user->prodi}}</i>
              </p>
              <h6 class="card-subtitle mb-2 text-muted">Diseminarkan pada <b>{{$sempro->schedule ? $jadwal : 'Belum ditentukan'}}</b> </h6>
            </div>
          </div>
    </div>
</div>

<div class="row mb-4">

  @if ($sempro->adviser1_code != null)
    <div class="col">
      <div class="card">
        <div class="card-body">
          <img src="{{asset($dosen1->user->pfp)}}" style="width: 10%; height: auto; float:left" alt="Foto Profil" class="mr-2">
          <h5 class="card-title">{{$dosen1->user->name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Pembimbing 1</h6>
          <p class="card-text">
            <i class="fa fa-envelope-o mr-3" aria-hidden="true"> {{$dosen1->user->email}}</i>
            <i class="fa fa-phone mr-3" aria-hidden="true"> {{$dosen1->user->phone_number}}</i>
            <i class="fa fa-graduation-cap" aria-hidden="true"> {{$dosen1->user->prodi}}</i>
          </p>
          <p class="card-text">{{$dosen1->address}}</p>
        </div>
      </div>
    </div>
  @endif
    
  @if ($sempro->adviser2_code != null && $sempro->adviser2_code != $sempro->adviser1_code)
    <div class="col">
      <div class="card">
        <div class="card-body">
          <img src="{{asset($dosen2->user->pfp)}}" style="width: 10%; height: auto; float:left" alt="Foto Profil" class="mr-2">
          <h5 class="card-title">{{$dosen2->user->name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Pembimbing 2</h6>
          <p class="card-text">
            <i class="fa fa-envelope-o mr-3" aria-hidden="true"> {{$dosen2->user->email}}</i>
            <i class="fa fa-phone mr-3" aria-hidden="true"> {{$dosen2->user->phone_number}}</i>
            <i class="fa fa-graduation-cap" aria-hidden="true"> {{$dosen2->user->prodi}}</i>
          </p>
          <p class="card-text">{{$dosen2->address}}</p>
        </div>
      </div>
    </div>
  @endif

</div>

<div class="row mb-4">
  @if ($sempro->examiner_code != null)
    <div class="col">
      <div class="card">
        <div class="card-body">
          <img src="{{asset($dosen3->user->pfp)}}" style="width: 10%; height: auto; float:left" alt="Foto Profil" class="mr-2">
          <h5 class="card-title">{{$dosen3->user->name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Pembimbing 1</h6>
          <p class="card-text">
            <i class="fa fa-envelope-o mr-3" aria-hidden="true"> {{$dosen3->user->email}}</i>
            <i class="fa fa-phone mr-3" aria-hidden="true"> {{$dosen3->user->phone_number}}</i>
            <i class="fa fa-graduation-cap" aria-hidden="true"> {{$dosen3->user->prodi}}</i>
          </p>
          <p class="card-text">{{$dosen3->address}}</p>
        </div>
      </div>
    </div>
  @endif
</div>

@endsection