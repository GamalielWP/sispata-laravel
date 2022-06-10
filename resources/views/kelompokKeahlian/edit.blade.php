@extends('dosen.sidebar')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/kelompok-keahlian-update/{{$mhs->user_id}}" method="POST">
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
                    <select name="Pembimbing1" class="form-select {{$sempro->adviser1_code != null ? 'mb-3' : ''}}" aria-label="Pembimbing1 select">
                        <option value="{{null}}" {{$sempro->adviser1_code == null ? 'selected' : ''}}>-- Belum ditentukan --</option>
                        @foreach ($dosen as $dos)
                            <option value="{{$dos->lecturer_code}}" {{$dos->lecturer_code == $sempro->adviser1_code ? 'selected' : ''}}>{{$dos->lecturer_code}} - {{$dos->user->name}}</option>
                        @endforeach
                    </select>
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
                    <select name="Pembimbing2" class="form-select" aria-label="Pembimbing2 select">
                        <option value="{{null}}" {{$sempro->adviser2_code == null ? 'selected' : ''}}>-- Belum ditentukan --</option>
                        @foreach ($dosen as $dos)
                            <option value="{{$dos->lecturer_code}}" {{$dos->lecturer_code == $sempro->adviser2_code ? 'selected' : ''}}>{{$dos->lecturer_code}} - {{$dos->user->name}}</option>
                        @endforeach
                    </select>
                    <span class="mb-3" style="color: red">* isi dengan kode dosen Pembimbing 1 jika anda hanya memilih satu pembimbing saja.</span>
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
                    <select name="Penguji" class="form-select" aria-label="Penguji select">
                        <option value="{{null}}" {{$sempro->examiner_code == null ? 'selected' : ''}}>-- Belum ditentukan --</option>
                        @foreach ($dosen as $dos)
                            <option value="{{$dos->lecturer_code}}" {{$dos->lecturer_code == $sempro->examiner_code ? 'selected' : ''}}>{{$dos->lecturer_code}} - {{$dos->user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    <label for="PhoneNumber" class="form-label">Nomor HP</label>
                    <input name="PhoneNumber" class="form-control @error('PhoneNumber') is-invalid @enderror mb-2" type="text" value="{{$mhs->user->phone_number}}" disabled>
                </div>
                <div class="col"></div>
            </div>

            @if ($sempro->adviser1_score == null && $sempro->adviser2_score == null && $sempro->examiner_score == null)
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Simpan
                </button>
            @endif
            <a href="/kelompok-keahlian-dashboard" class="btn btn-primary">
                <i class="fa fa-dashboard"></i>
                Dashboard
            </a>
        </form>
    </div>
    
</div>
@endsection