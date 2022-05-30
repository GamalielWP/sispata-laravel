@extends('dosen.sidebar')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/gugus-tugas-update/{{$mhs->user_id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group center">
                <label for="pfp" class="form-label" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Foto Profil">
                    <img src="{{asset($mhs->user->pfp)}}" alt="Foto Profil" class="mr-2 img-style">
                </label> 
            </div>

            <div class="row">
                <div class="form-group col">
                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                    <label for="Judul" class="form-label">Judul</label>
                    <input name="Judul" class="form-control mb-2" type="text" value="{{$sempro->title}}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <i class="fa fa-id-card" aria-hidden="true"></i>
                    <label for="Nim" class="form-label">NIM</label>
                    <input name="Nim" class="form-control mb-2" type="text" value="{{$mhs->nim}}" disabled>
                </div>
                <div class="form-group col">
                    <i class="fa fa-lightbulb-o"></i>
                    <label for="Pembimbing1" class="form-label">Pembimbing 1</label>
                    <input name="Pembimbing1" class="form-control mb-3" type="text" value="{{$sempro->adviser1_code !=null ? $dosen1->user->name : ''}}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                    <label for="Nama" class="form-label">Nama</label>
                    <input name="Nama" class="form-control mb-2" type="text" value="{{$mhs->user->name}}" disabled>
                </div>
                <div class="form-group col">
                    <i class="fa fa-lightbulb-o"></i>
                    <label for="Pembimbing2" class="form-label">Pembimbing 2</label>
                    @if ($sempro->adviser2_code != $sempro->adviser1_code)
                        <input name="Pembimbing2" class="form-control mb-3" type="text" value="{{$sempro->adviser1_code !=null ? $dosen2->user->name : ''}}" disabled>
                    @else
                        <input name="Pembimbing2" class="form-control mb-3" type="text" value="-" disabled>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <label for="Email" class="form-label">Email</label>
                    <input name="Email" class="form-control @error('Email') is-invalid @enderror mb-2" type="text" value="{{$mhs->user->email}}" disabled>
                </div>
                <div class="form-group col">
                    <i class="fa fa-id-badge"></i>
                    <label for="Penguji" class="form-label">Penguji</label>
                    <input name="Penguji" class="form-control mb-3" type="text" value="{{$sempro->examiner_code !=null ? $dosen3->user->name : 'Belum ditentukan'}}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    <label for="PhoneNumber" class="form-label">Nomor HP</label>
                    <input name="PhoneNumber" class="form-control @error('PhoneNumber') is-invalid @enderror mb-2" type="text" value="{{$mhs->user->phone_number}}" disabled>
                </div>
                <div class="form-group col">
                    <i class="fa fa-code-fork" aria-hidden="true"></i>
                    <label for="Bidang" class="form-label">Bidang Keahlian</label>
                    <select name="Bidang" class="form-select" aria-label="Scope select">
                        @foreach ($bidang as $bd)
                            <option value="{{$bd->id}}" {{$bd->id == $sempro->scope_id ? 'selected' : ''}}>{{$bd->scope}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                    <label for="Schedule" class="form-label">Jadwal Seminar Proposal</label>
                    <input name="Schedule" type="date" class="form-control mb-3" value="{{$sempro->schedule !=null ? $sempro->schedule : ''}}" {{$sempro->examiner_code == null ? 'disabled' : ''}}>
                </div>
                <div class="col"></div>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Simpan
            </button>
            <a href="/gugus-tugas-dashboard" class="btn btn-primary">
                <i class="fa fa-dashboard"></i>
                Dashboard
            </a>
        </form>
    </div>
    
</div>
@endsection