@extends('mahasiswa.sidebar')

@section('content')

<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-body">
              <img src="{{asset($mhs->user->pfp)}}" style="width: 10%; height: auto; float:left; padding-bottom:0.5%" alt="Foto Profil" class="mr-2">
              <a href="/mahasiswa-file" style="float: right" class="fa fa-pencil btn-success btn-sm"></a>
              <h5 class="card-title">{{$sempro->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$mhs->nim}} - {{$mhs->user->name}} <b style="color: {{$mhs->thesis_proposal != null ? 'green' : 'red'}}">&nbsp;&nbsp;{{$mhs->thesis_proposal != null ? 'Terdaftar' : 'Belum Terdaftar'}}</b></h6>
              <p class="card-text">
                <i class="fa fa-envelope-o mr-3" aria-hidden="true"> {{$mhs->user->email}}</i>
                <i class="fa fa-phone mr-3" aria-hidden="true"> {{$mhs->user->phone_number}}</i>
                <i class="fa fa-graduation-cap" aria-hidden="true"> {{$mhs->user->prodi}}</i>
              </p>
              <h6 class="card-subtitle mb-2 text-muted">Diseminarkan pada <b>{{$sempro->schedule ? $jadwal : 'Belum ditentukan'}}</b> </h6>
              <br><hr>
              <div class="row">
                <div class="col">
                  <h6><b>Nilai Pembimbing 1</b></h6>
                  <span><b>{{$sempro->adviser1_score != null ? $sempro->adviser1_score : 'Belum dinilai'}}</b></span>
                </div>
                @if ($sempro->adviser2_code != null)
                  <div class="col">
                    <h6><b>Nilai Pembimbing 2</b></h6>
                    <span><b>{{$sempro->adviser2_score != null ? $sempro->adviser2_score : 'Belum dinilai'}}</b></span>
                  </div>
                @endif
                <div class="col">
                  <h6><b>Nilai Penguji</b></h6>
                  <span><b>{{$sempro->examiner_score != null ? $sempro->examiner_score : 'Belum dinilai'}}</b></span>
                </div>
                <div class="col">
                  <h6><b>Nilai Rata-rata</b></h6>
                  @if ($sempro->adviser2_score == null)
                    <span><b>{{($sempro->adviser1_score + $sempro->examiner_score)/2}}</b></span>
                  @else
                    <span><b>{{($sempro->adviser1_score + $sempro->adviser2_score + $sempro->examiner_score)/3}}</b></span>
                  @endif
                </div>
              </div>
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
          <h6 class="card-subtitle mb-2 text-muted">Penguji</h6>
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