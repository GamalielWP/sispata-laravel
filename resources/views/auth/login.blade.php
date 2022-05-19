@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="row ">
                    <div class="col" style="margin-right: 3%">
                        <img class="gambar-1-login" src="img/ittp.jpg" class="img-fluid rounded-start" alt="Gambar">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <div class="container login-side-2">
                                <img class="gambar-2-login" src="img/fif.png" alt="Logo Fakultas Informatika">
                                <h6>Sistem Pendaftaran Tugas Akhir 1</h6>
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
        
                                <div class="form-group row">
                                    {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
        
                                    {{-- <div class="col-md-6"> --}}
                                        <input placeholder="Email Institusi" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    {{-- </div> --}}
                                </div>
        
                                <div class="form-group row">
                                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
        
                                    {{-- <div class="col-md-6"> --}}
                                        <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    {{-- </div> --}}
                                </div>
        
                                {{-- <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
        
                                <div class="form-group row mb-0">
                                    {{-- <div class="col-md-8 offset-md-4"> --}}
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
        
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    {{-- </div> --}}
                                </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
