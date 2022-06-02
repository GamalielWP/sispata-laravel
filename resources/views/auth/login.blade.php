@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card login">
        <div class="card-body">
            <div class="container">
                <img class="gambar-login" src="img/fif.png" alt="Logo Fakultas Informatika">
                <h6 class="mb-3">Sistem Pendaftaran Tugas Akhir 1</h6>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <input placeholder="Email Institusi" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Lupa passwordnya?') }}
                            </a>
                        @endif
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Baru pertama kali kesini?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
