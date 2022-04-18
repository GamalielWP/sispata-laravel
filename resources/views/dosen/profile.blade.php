@extends('dosen.sidebar')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/dosen-profile-updated/{{$dsn->user_id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="Nim" class="form-label">NIDN</label>
                    <input name="Nim" class="form-control mb-2" type="text" value="{{$dsn->nidn}}" disabled>
                </div>

                <div class="form-group">
                    <label for="Nama" class="form-label">Nama</label>
                    <input name="Nama" class="form-control mb-2" type="text" value="{{$dsn->user->name}}" disabled>
                </div>

                <div class="form-group">
                    <label for="Email" class="form-label">Email</label>
                    <input name="Email" class="form-control @error('Email') is-invalid @enderror mb-2" type="text" value="{{$dsn->user->email}}">
                    @error('Email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="PhoneNumber" class="form-label">Nomor HP</label>
                    <input name="PhoneNumber" class="form-control @error('PhoneNumber') is-invalid @enderror mb-2" type="text" value="{{$dsn->user->phone_number}}">
                    @error('PhoneNumber')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Prodi" class="form-label">Program Studi</label>
                    <input name="Prodi" class="form-control mb-3" type="text" value="{{$dsn->user->prodi}}" disabled>
                </div>
                
                <div class="form-group">
                    <label for="Alamat" class="form-label">Alamat</label>
                    <textarea name="Alamat" class="form-control @error('Alamat') is-invalid @enderror mb-3" rows="3">{{$dsn->address}}</textarea>
                    @error('Alamat')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <img src="{{asset($dsn->user->pfp)}}" style="width: 10%; height: auto; padding-bottom:0.5%" alt="Foto Profil" class="mr-2">
                    <input name="ProfilePhotos" class="form-control @error('ProfilePhotos') is-invalid @enderror mb-3" type="file">
                    @error('ProfilePhotos')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <hr>

                <div class="form-group">
                    <label for="NewPassword" class="form-label">Password Baru</label>
                    <input name="NewPassword" class="form-control @error('NewPassword') is-invalid @enderror mb-2" type="password" placeholder="Password Baru">
                    @error('NewPassword')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ConfirmPassword" class="form-label">Ulangi Password</label>
                    <input name="ConfirmPassword" class="form-control @error('ConfirmPassword') is-invalid @enderror mb-2" type="password" placeholder="Ulangi Password">
                    @error('ConfirmPassword')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <hr>

                <div class="form-group">
                    <label for="OldPassword" class="form-label">Password Saat Ini</label>
                    <input name="OldPassword" class="form-control @error('OldPassword') is-invalid @enderror mb-2" type="password" placeholder="Password Saat Ini">
                    @error('OldPassword')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        
    </div>
@endsection