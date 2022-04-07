@extends('mahasiswa.sidebar')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/mahasiswa-profile-updated/{{Auth::user()->id}}" method="POST">
                @csrf
                @method('PATCH')
                <label for="Nim" class="form-label">NIM</label>
                <input name="Nim" class="form-control mb-2" type="text" value="{{$mhs->nim}}" disabled>
                
                <label for="Nama" class="form-label">Nama</label>
                <input name="Nama" class="form-control mb-2" type="text" value="{{$mhs->user->name}}" disabled>

                <label for="Email" class="form-label">Email</label>
                <input name="Email" class="form-control mb-2" type="text" value="{{$mhs->user->email}}">

                <label for="Phone" class="form-label">Nomor HP</label>
                <input name="Phone" class="form-control mb-2" type="text" value="{{$mhs->user->phone_number}}">

                <label for="Prodi" class="form-label">Program Studi</label>
                <input name="Prodi" class="form-control mb-3" type="text" value="{{$mhs->user->prodi}}" disabled>

                <img src="{{asset($mhs->user->pfp)}}" style="width: 10%; height: auto; float:left; padding-bottom:0.5%" alt="Foto Profil" class="mr-2">
                <input name="FotoProfil" class="form-control mb-3" type="file">
                
                <hr>

                <label for="NewPass" class="form-label">Password Baru</label>
                <input name="NewPass" class="form-control mb-2" type="password">

                <label for="ConfirmPass" class="form-label">Ulangi Password</label>
                <input name="ConfirmPass" class="form-control mb-2" type="password">
                
                <hr>

                <label for="OldPass" class="form-label">Password Saat Ini</label>
                <input name="OldPass" class="form-control mb-2" type="password">

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        
    </div>
@endsection