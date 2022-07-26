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
                        <table class="table table-striped" id="data-tabel">
                            <thead>
                                <tr>
                                    <th>NIDN</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Nomor HP</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                        </table>
                        <a class="btn btn-warning mt-2" data-bs-toggle="collapse" href="#collapse-dosen">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            Tambah Dosen
                        </a>
                        <hr>
                        <form class="collapse
                            @error('nik') show @enderror
                            @error('nidn') show @enderror
                            @error('Nama') show @enderror
                            @error('lecturer_code') show @enderror
                            @error('email') show @enderror
                            @error('Phone') show @enderror"

                            id="collapse-dosen"
                            method="POST" action="/gugus-tugas-add-dosen">
                            @csrf

                            <div class="row">
                                <div class="form-group col">
                                    <div class="row">
                                        <div class="col">
                                            <i class="fa fa-id-card" aria-hidden="true"></i>
                                            <label for="nik" class="form-label">{{ __('NIK') }}</label>
    
                                            <div class="">
                                                <input id="nik" type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" placeholder="NIK">
    
                                                @error('nik')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <i class="fa fa-id-card" aria-hidden="true"></i>
                                            <label for="nidn" class="form-label">{{ __('NIDN') }}</label>
    
                                            <div class="">
                                                <input id="nidn" type="number" class="form-control @error('nidn') is-invalid @enderror" name="nidn" value="{{ old('nidn') }}" autocomplete="nidn" placeholder="NIDN">
    
                                                @error('nidn')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                    <label for="Nama" class="form-label">{{ __('Nama') }}</label>
    
                                    <div class="">
                                        <input id="Nama" type="text" class="form-control @error('Nama') is-invalid @enderror" name="Nama" value="{{ old('Nama') }}" required autocomplete="Nama" placeholder="Nama Lengkap">
    
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
                                        <input id="lecturer_code" type="text" class="form-control @error('lecturer_code') is-invalid @enderror" name="lecturer_code" value="{{ old('lecturer_code') }}" required autocomplete="lecturer_code" placeholder="Kode Dosen">
    
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
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
    
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
                                        <input id="Phone" type="text" class="form-control @error('Phone') is-invalid @enderror" name="Phone" value="{{ old('Phone') }}" required autocomplete="Phone" placeholder="Nomor HP">
    
                                        @error('Phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label for="Prodi" class="form-label">{{ __('Prodi') }}</label>
        
                                    <div class="">
                                        <select name="Prodi" class="form-control @error('Prodi') is-invalid @enderror" required>
                                            <option value="S1-Rekayasa Perangkat Lunak">S1-Rekayasa Perangkat Lunak</option>
                                            <option value="S1-Teknik Informatika">S1-Teknik Informatika</option>
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
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <a href="/" class="btn btn-primary ">
                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                        {{ __('Kembali') }}
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        {{ __('Tambahkan') }}
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
                { data: 'role', name: 'role' },
                { data: 'phone_number', name: 'phone' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'aksi' }
            ]
        });
    })
</script>
@endsection