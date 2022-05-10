@extends('mahasiswa.sidebar')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/mahasiswa-file-updated/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="Judul" class="form-label">Judul</label>
                    <input name="Judul" class="form-control @error('Judul') is-invalid @enderror mb-2" type="text" value="{{$sempro->title !=null ? $sempro->title : ''}}" placeholder="Ketik judul penelitian...">
                    @error('Judul')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="Pembimbing1" class="form-label">Pembimbing-1</label>
                    <input name="Pembimbing1" class="form-control mb-3" list="dosen1" id="exampleDataList" value="{{$sempro->adviser1_code !=null ? $sempro->adviser1_code : ''}}" placeholder="Ketik untuk mencari...">
                    <datalist id="dosen1">
                        @foreach ($dosen as $dos)
                            <option value="{{$dos->lecturer_code}}">
                        @endforeach
                    </datalist>
                </div>

                <div class="form-group">
                    <label for="Pembimbing2" class="form-label">Pembimbing-2</label>
                    <input name="Pembimbing2" class="form-control" list="dosen2" id="exampleDataList" value="{{$sempro->adviser2_code !=null ? $sempro->adviser2_code : ''}}" placeholder="Ketik untuk mencari...">
                    <datalist id="dosen2">
                        @foreach ($dosen as $dos)
                            <option value="{{$dos->lecturer_code}}">
                        @endforeach
                    </datalist>
                    <span class="mb-3" style="color: red">* isi dengan kode dosen Pembimbing 1 jika anda hanya memilih satu pembimbing saja.</span>
                </div>

                <div class="form-group">
                    <label for="Form" class="form-label">Form Perdaftaran</label>
                    <input name="Form" class="form-control @error('Form') is-invalid @enderror mb-3" type="file" id="formFile">
                    @error('Form')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="KSM" class="form-label">Kartu Studi Mahasiswa</label>
                    <input name="KSM" class="form-control @error('KSM') is-invalid @enderror mb-3" type="file" id="formFile">
                    @error('KSM')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="Transkrip" class="form-label">Transkrip Nilai Sementara</label>
                    <input name="Transkrip" class="form-control @error('Transkrip') is-invalid @enderror mb-3" type="file" id="formFile">
                    @error('Transkrip')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Pengesahan" class="form-label">Lembar Pengesahan</label>
                    <input name="Pengesahan" class="form-control @error('Pengesahan') is-invalid @enderror mb-3" type="file" id="formFile">
                    @error('Pengesahan')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Proposal" class="form-label">Proposal TA 1</label>
                    <input name="Proposal" class="form-control @error('Proposal') is-invalid @enderror mb-3" type="file" id="formFile">
                    @error('Proposal')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        
    </div>
@endsection