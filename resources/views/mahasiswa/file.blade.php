@extends('mahasiswa.sidebar')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/mahasiswa-file-updated/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <label for="Judul" class="form-label">Judul</label>
                <input name="Judul" class="form-control mb-2" type="text" value="" placeholder="Ketik judul penelitian...">
                
                <label for="Pembimbing-1" class="form-label">Pembimbing-1</label>
                <input name="Pembimbing-1" class="form-control mb-3" list="dosen1" id="exampleDataList" value="" placeholder="Ketik untuk mencari...">
                <datalist id="dosen1">
                    @foreach ($dosen as $dos)
                        <option value="{{$dos->user->id}}">{{$dos->user->name}}</option>
                    @endforeach
                </datalist>

                <label for="Pembimbing-2" class="form-label">Pembimbing-2</label>
                <input name="Pembimbing-2" class="form-control mb-3" list="dosen2" id="exampleDataList" value="" placeholder="Ketik untuk mencari...">
                <datalist id="dosen2">
                    @foreach ($dosen as $dos)
                        <option hidden value="{{$dos->user->id}}">{{$dos->user->name}}</option>
                    @endforeach
                </datalist>

                <label for="Form" class="form-label">Form Perdaftaran</label>
                <input name="Form" class="form-control mb-3" type="file" id="formFile">
                
                <label for="KSM" class="form-label">Kartu Studi Mahasiswa</label>
                <input name="KSM" class="form-control mb-3" type="file" id="formFile">
                
                <label for="Transkrip" class="form-label">Transkrip Nilai Sementara</label>
                <input name="Transkrip" class="form-control mb-3" type="file" id="formFile">

                <label for="Pengesahan" class="form-label">Lembar Pengesahan</label>
                <input name="Pengesahan" class="form-control mb-3" type="file" id="formFile">

                <label for="Proposal" class="form-label">Proposal TA 1</label>
                <input name="Proposal" class="form-control mb-3" type="file" id="formFile">

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        
    </div>
@endsection