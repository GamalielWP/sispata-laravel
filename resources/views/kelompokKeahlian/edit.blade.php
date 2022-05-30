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
                    <input name="Pembimbing1" class="form-control mb-3" list="dosen1" id="DataList" type="text" value="{{$sempro->adviser1_code !=null ? $sempro->adviser1_code : ''}}" placeholder="Ketik untuk mencari...">
                    <datalist id="dosen1">
                        @foreach ($dosen as $dos)
                            <option value="{{$dos->lecturer_code}}">{{$dos->user->name}}
                        @endforeach
                    </datalist>
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
                    <input name="Pembimbing2" class="form-control" list="dosen2" id="DataList" type="text" value="{{$sempro->adviser2_code !=null ? $sempro->adviser2_code : ''}}" placeholder="Ketik untuk mencari...">
                    <datalist id="dosen2">
                        @foreach ($dosen as $dos)
                            <option value="{{$dos->lecturer_code}}">{{$dos->user->name}}
                        @endforeach
                    </datalist>
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
                    <input name="Penguji" class="form-control mb-3" list="dosen3" id="DataList" type="text" value="{{$sempro->examiner_code !=null ? $sempro->examiner_code : ''}}" placeholder="Ketik untuk mencari...">
                    <datalist id="dosen3">
                        @foreach ($dosen as $dos)
                            <option value="{{$dos->lecturer_code}}">{{$dos->user->name}}
                        @endforeach
                    </datalist>
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

            <button type="submit" class="btn btn-success">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Simpan
            </button>
            <a href="/kelompok-keahlian-dashboard" class="btn btn-primary">
                <i class="fa fa-dashboard"></i>
                Dashboard
            </a>
        </form>
    </div>
    
</div>
@endsection