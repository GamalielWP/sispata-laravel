@extends('mahasiswa.sidebar')

@section('menu')
    <div class="card">
        <div class="card-body">
            <form action="">
                <label for="Judul" class="form-label">Judul</label>
                <input name="Judul" class="form-control mb-2" type="text" value="Pengembangan Perangkat Lunak dengan Metode Prototyping">
                
                <label for="Pembimbing-1" class="form-label">Pembimbing-1</label>
                <input name="Pembimbing=1" class="form-control mb-3" list="dosen1" id="exampleDataList" placeholder="Ketik untuk mencari...">
                <datalist id="dosen1">
                    <option value="Dosen 1">
                    <option value="Dosen 2">
                    <option value="Dosen 3">
                    <option value="Dosen 4">
                    <option value="Dosen 5">
                </datalist>

                <label for="Pembimbing-2" class="form-label">Pembimbing-2</label>
                <input name="Pembimbing-2" class="form-control mb-3" list="dosen2" id="exampleDataList" placeholder="Ketik untuk mencari...">
                <datalist id="dosen2">
                    <option value="Dosen 1">
                    <option value="Dosen 2">
                    <option value="Dosen 3">
                    <option value="Dosen 4">
                    <option value="Dosen 5">
                </datalist>

                <label for="Berkas" class="form-label">Berkas Perdaftaran</label>
                <input name="Berkas" class="form-control mb-3" type="file" id="formFile">
            </form>
        </div>
        
    </div>
@endsection