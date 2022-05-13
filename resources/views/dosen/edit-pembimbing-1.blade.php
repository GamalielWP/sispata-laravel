@extends('dosen.sidebar')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/dosen-pembimbing-1-update/{{$mhs->user_id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <img src="{{asset($mhs->user->pfp)}}" style="width: 10%; height: auto; padding-bottom:0.5%" alt="Foto Profil" class="mr-2">
            </div>

            <div class="form-group">
                <label for="Nim" class="form-label">NIM</label>
                <input name="Nim" class="form-control mb-2" type="text" value="{{$mhs->nim}}" disabled>
            </div>

            <div class="form-group">
                <label for="Judul" class="form-label">Judul</label>
                <input name="Judul" class="form-control mb-2" type="text" value="{{$sempro->title}}" disabled>
            </div>

            <div class="form-group">
                <label for="Nama" class="form-label">Nama</label>
                <input name="Nama" class="form-control mb-2" type="text" value="{{$mhs->user->name}}" disabled>
            </div>

            <div class="form-group">
                <label for="Email" class="form-label">Email</label>
                <input name="Email" class="form-control @error('Email') is-invalid @enderror mb-2" type="text" value="{{$mhs->user->email}}" disabled>
            </div>

            <div class="form-group">
                <label for="PhoneNumber" class="form-label">Nomor HP</label>
                <input name="PhoneNumber" class="form-control @error('PhoneNumber') is-invalid @enderror mb-2" type="text" value="{{$mhs->user->phone_number}}" disabled>
            </div>

            <div class="form-group">
                <label for="Pembimbing1" class="form-label">Pembimbing 1</label>
                <input name="Pembimbing1" class="form-control mb-3" type="text" value="{{$sempro->adviser1_code !=null ? $dosen1->user->name : ''}}" disabled>
            </div>

            @if ($sempro->adviser2_code != $sempro->adviser1_code)
                <div class="form-group">
                    <label for="Pembimbing2" class="form-label">Pembimbing 2</label>
                    <input name="Pembimbing2" class="form-control mb-3" type="text" value="{{$sempro->adviser1_code !=null ? $dosen2->user->name : ''}}" disabled>
                </div>
            @endif

            <div class="form-group">
                <label for="Penguji" class="form-label">Penguji</label>
                <input name="Penguji" class="form-control mb-3" type="text" value="{{$sempro->examiner_code !=null ? $dosen3->user->name : 'Belum ditentukan'}}" disabled>
            </div>

            <div class="form-group">
                <label for="Schedule" class="form-label">Jadwal Seminar Proposal</label>
                <input name="Schedule" type="date" class="form-control mb-3" value="{{$sempro->schedule !=null ? $sempro->schedule : ''}}" disabled>
            </div>

            <div class="form-group">
                <label for="Nilai" class="form-label">Nilai</label>
                <input name="Nilai" class="form-control mb-3" type="number" min="0" max="100" value="{{$sempro->adviser1_score !=null ? $sempro->adviser1_score : '0'}}">
            </div>

            <div class="form-group">
                <label for="BeritaAcara" class="form-label">Berita Acara</label>
                <br>
                <a href="/dosen-pembimbing-1-print/{{$mhs->user_id}}" class="btn btn-warning">Cetak</a>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/dosen-pembimbing" class="btn btn-primary">Kembali</a>
        </form>
    </div>
    
</div>
@endsection