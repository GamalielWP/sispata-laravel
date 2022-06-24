@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card regis">
                <div class="card-header bg-young-brown text-white">{{ __('Registrasi Mahasiswa') }}</div>
                <div class="card-body">
                    <form method="POST" action="/register-up">
                        @csrf

                        <div class="form-group">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                            <label for="Nim" class="form-label">{{ __('NIM') }}</label>

                            <div class="">
                                <input id="Nim" type="text" class="form-control @error('Nim') is-invalid @enderror" name="Nim" value="{{ old('Nim') }}" required autocomplete="Nim">

                                @error('Nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-id-badge" aria-hidden="true"></i>
                            <label for="Nama" class="form-label">{{ __('Nama') }}</label>

                            <div class="">
                                <input id="Nama" type="text" class="form-control @error('Nama') is-invalid @enderror" name="Nama" value="{{ old('Nama') }}" required autocomplete="Nama">

                                @error('Nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <label for="Email" class="form-label">{{ __('E-Mail') }}</label>

                            <div class="">
                                <input id="Email" type="email" class="form-control @error('Email') is-invalid @enderror" name="Email" value="{{ old('Email') }}" required autocomplete="Email">

                                @error('Email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                            <label for="Phone" class="form-label">{{ __('Nomor HP') }}</label>

                            <div class="">
                                <input id="Phone" type="text" class="form-control @error('Phone') is-invalid @enderror" name="Phone" value="{{ old('Phone') }}" required autocomplete="Phone">

                                @error('Phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <label for="Prodi" class="form-label">{{ __('Prodi') }}</label>

                            <div class="">
                                <select name="Prodi" class="form-control @error('Prodi') is-invalid @enderror" required>
                                    <option value="S1-Rekayasa Perangkat Lunak">S1-Rekayasa Perangkat Lunak</option>
                                    <option value="S1-Informatika">S1-Teknik Informatika</option>
                                    <option value="S1-Sistem Informasi">S1-Sistem Informasi</option>
                                    <option value="S1-Sains Data">S1-Sains Data</option>
                                </select>

                                @error('Prodi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <label for="NewPassword" class="form-label">{{ __('Password') }}</label>

                            <div class="">
                                <input id="NewPassword" type="password" class="form-control @error('NewPassword') is-invalid @enderror" name="NewPassword" required>

                                @error('NewPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            <label for="ConfirmPassword" class="form-label">{{ __('Konfirmasi Password') }}</label>

                            <div class="">
                                <input id="ConfirmPassword" type="password" class="form-control @error('ConfirmPassword') is-invalid @enderror" name="ConfirmPassword" required>

                                @error('ConfirmPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <a href="/" class="btn btn-primary ">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    {{ __('Login') }}
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
