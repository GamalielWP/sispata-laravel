@extends('dosen.sidebar')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/dosen-pembimbing-1-update/{{$mhs->user_id}}" method="POST">
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
                    <input name="Judul" class="form-control mb-2 @error('Judul') is-invalid @enderror" type="text" value="{{$sempro->title}}">
                    @error('Judul')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
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
                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                    <label for="Schedule" class="form-label">Jadwal Seminar Proposal</label>
                    <input name="Schedule" type="date" class="form-control mb-3" value="{{$sempro->schedule !=null ? $sempro->schedule : ''}}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#score-collapse">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        Nilai
                    </a>
                    <div class="collapse" id="score-collapse">
                        <div class="row">
                            <div class="form-group">
                                <label for="Ide" class="form-label">Ide dan Rumusan Masalah</label>
                                <input name="Ide" class="form-control mb-3" type="number" min="0" max="20" value="{{$sempro->adviser1_score !=null ? $score->ide : '0'}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="Solusi" class="form-label">Teknik Solusi</label>
                                <input name="Solusi" class="form-control mb-3" type="number" min="0" max="20" value="{{$sempro->adviser1_score !=null ? $score->solusi : '0'}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="Analisa" class="form-label">Analisa dan Penarikan simpulan</label>
                                <input name="Analisa" class="form-control mb-3" type="number" min="0" max="20" value="{{$sempro->adviser1_score !=null ? $score->analisa : '0'}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="Penulisan" class="form-label">Tata Tulis Proposal</label>
                                <input name="Penulisan" class="form-control mb-3" type="number" min="0" max="20" value="{{$sempro->adviser1_score !=null ? $score->penulisan : '0'}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group ">
                                <label for="Kemandirian" class="form-label">Kemandirian</label>
                                <input name="Kemandirian" class="form-control mb-3" type="number" min="0" max="20" value="{{$sempro->adviser1_score !=null ? $score->kemandirian_presentasi : '0'}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    <label for="BeritaAcara" class="form-label">Berita Acara</label>
                    <br>
                    <a href="/dosen-pembimbing-1-print/{{$mhs->user_id}}" class="btn btn-warning">
                        <i class="fa fa-print" aria-hidden="true"></i>
                        Cetak
                    </a>
                </div>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Simpan
            </button>
            <a href="/dosen-pembimbing-1" class="btn btn-primary">
                <i class="fa fa-lightbulb-o"></i>
                Kembali
            </a>
        </form>
    </div>
    
</div>
@endsection