@extends('mahasiswa.sidebar')

@section('content')
    <div class="card border-radius">
        <div class="card-body">
            <form action="/mahasiswa-profile-updated/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group center">
                    <label for="pfp" class="form-label" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Klik untuk edit">
                        <img src="{{asset($mhs->user->pfp)}}" alt="Foto Profil" class="mr-2 img-style">
                        <input id="pfp" name="ProfilePhotos" class="form-control filePfp @error('ProfilePhotos') is-invalid @enderror mb-3" type="file">
                        @error('ProfilePhotos')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </label> 
                </div>
                
                <div class="row">
                    <div class="form-group col">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        <label for="Nim" class="form-label">NIM</label>
                        <input name="Nim" class="form-control @error('Nim') is-invalid @enderror mb-2" type="text" value="{{$mhs->nim}}">
                        @error('Nim')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <label for="Email" class="form-label">Email</label>
                        <input name="Email" class="form-control @error('Email') is-invalid @enderror mb-2" type="text" value="{{$mhs->user->email}}">
                        @error('Email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <i class="fa fa-id-badge" aria-hidden="true"></i>
                        <label for="Nama" class="form-label">Nama</label>
                        <input name="Nama" class="form-control @error('Nama') is-invalid @enderror mb-2" type="text" value="{{$mhs->user->name}}">
                        @error('Nama')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <label for="PhoneNumber" class="form-label">Nomor HP</label>
                        <input name="PhoneNumber" class="form-control @error('PhoneNumber') is-invalid @enderror mb-2" type="text" value="{{$mhs->user->phone_number}}">
                        @error('PhoneNumber')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <label for="Prodi" class="form-label">Program Studi</label>
                        <input name="Prodi" class="form-control mb-3" type="text" value="{{$mhs->user->prodi}}" disabled>
                    </div>
                    <div class="col">
                        
                    </div>
                </div>

                <a class="btn btn-warning" data-bs-toggle="collapse" href="#pwd-collapse-mahasiswa">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    Ubah Password
                </a>
                <hr>
                <div class="collapse
                @error('NewPassword') show @enderror
                @error('ConfirmPassword') show @enderror
                @error('OldPassword') show @enderror"
                id="pwd-collapse-mahasiswa">
                    <div class="form-group">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <label for="NewPassword" class="form-label">Password Baru</label>
                        <input name="NewPassword" class="form-control @error('NewPassword') is-invalid @enderror mb-2" type="password" placeholder="Password Baru">
                        @error('NewPassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <label for="ConfirmPassword" class="form-label">Ulangi Password</label>
                        <input name="ConfirmPassword" class="form-control @error('ConfirmPassword') is-invalid @enderror mb-2" type="password" placeholder="Ulangi Password">
                        @error('ConfirmPassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <hr>
    
                    <div class="form-group">
                        <i class="fa fa-unlock" aria-hidden="true"></i>
                        <label for="OldPassword" class="form-label">Password Saat Ini</label>
                        <input name="OldPassword" class="form-control @error('OldPassword') is-invalid @enderror mb-2" type="password" placeholder="Password Saat Ini">
                        @error('OldPassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Simpan
                </button>
            </form>
        </div>
        
    </div>
@endsection