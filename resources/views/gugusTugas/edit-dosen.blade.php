@extends('dosen.sidebar')

@section('role')
    <h3 class="mb-3">Gugus Tugas {{Auth::user()->prodi}}</h3>
@endsection

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card border-radius">
                    <div class="card-body">
                        <form method="POST" action="/gugus-tugas-update-dosen/{{$dosen->user_id}}">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="form-group col">
                                    <i class="fa fa-id-card" aria-hidden="true"></i>
                                    <label for="nidn" class="form-label">{{ __('NIDN') }}</label>
    
                                    <div class="">
                                        <input id="nidn" type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{ $dosen->nidn }}" required autocomplete="nidn">
    
                                        @error('nidn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                    <label for="Nama" class="form-label">{{ __('Nama') }}</label>
    
                                    <div class="">
                                        <input id="Nama" type="text" class="form-control @error('Nama') is-invalid @enderror" name="Nama" value="{{ $dosen->user->name }}" required autocomplete="Nama">
    
                                        @error('Nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                    <label for="lecturer_code" class="form-label">{{ __('Kode Dosen') }}</label>
    
                                    <div class="">
                                        <input id="lecturer_code" type="text" class="form-control @error('lecturer_code') is-invalid @enderror" name="lecturer_code" value="{{ $dosen->lecturer_code }}" required autocomplete="lecturer_code">
    
                                        @error('lecturer_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <label for="email" class="form-label">{{ __('E-Mail') }}</label>
    
                                    <div class="">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $dosen->user->email }}" required autocomplete="email">
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                    <label for="Phone" class="form-label">{{ __('Nomor HP') }}</label>
    
                                    <div class="">
                                        <input id="Phone" type="text" class="form-control @error('Phone') is-invalid @enderror" name="Phone" value="{{ $dosen->user->phone_number }}" required autocomplete="Phone">
    
                                        @error('Phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                    <label for="Role" class="form-label">{{ __('Role') }}</label>
        
                                    <div class="">
                                        <select name="Role" class="form-control @error('Role') is-invalid @enderror" required>
                                            <option value="pembimbing-penguji" {{$dosen->user->role == "pembimbing-penguji" ? 'selected' : ''}}>Pembimbing - Penguji</option>
                                            <option value="gugus-tugas" {{$dosen->user->role == "gugus-tugas" ? 'selected' : ''}}>Gugus Tugas</option>
                                            <option value="kelompok-keahlian" {{$dosen->user->role == "kelompok-keahlian" ? 'selected' : ''}}>Ketua KK</option>
                                            <option value="kk-gg" {{$dosen->user->role == "kk-gg" ? 'selected' : ''}}>Ketua KK - Gugus Tugas</option>
                                        </select>
        
                                        @error('Role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    <label for="Prodi" class="form-label">{{ __('Prodi') }}</label>
        
                                    <div class="">
                                        <select name="Prodi" class="form-control @error('Prodi') is-invalid @enderror" required>
                                            @foreach ($prodi as $pr)
                                                <option value="{{$pr}}" {{$dosen->user->prodi == $pr? 'selected' : ''}}>{{$pr}}</option>
                                            @endforeach
                                        </select>
        
                                        @error('Prodi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <a href="/gugus-tugas-list-dosen" class="btn btn-primary ">
                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                        {{ __('Kembali') }}
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        {{ __('Simpan') }}
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

@section('table')
<script>
    $(document).ready( function () {
        $('#data-tabel').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dataDosen') }}",
            columns: [
                { data: 'nidn', name: 'nidn' },
                { data: 'lecturer_code', name: 'kode' },
                { data: 'name', name: 'nama' },
                { data: 'phone_number', name: 'phone' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'aksi' }
            ]
        });
    })
</script>
@endsection