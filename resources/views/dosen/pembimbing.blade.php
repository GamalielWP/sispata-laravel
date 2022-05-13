@extends('dosen.sidebar')

@section('content')
    <h3>Role Pembimbing 1</h3>
    <hr>
    <table class="table table-striped" id="data-tabel">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Judul</th>
                <th>Nama Mahasiswa</th>
                <th>Prodi</th>
                <th>Berkas</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
                
        </tbody>
    </table>

    <hr class="mt-5">
    <hr class="mb-5">

    <h3>Role Pembimbing 2</h3>
    <hr>
    <table class="table table-striped" id="data-tabel2">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Judul</th>
                <th>Nama Mahasiswa</th>
                <th>Prodi</th>
                <th>Berkas</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
                
        </tbody>
    </table>
@endsection

@section('table')
<script>
$(document).ready( function () {
    $('#data-tabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('dataDosen') }}",
        columns: [
            { data: 'nim', name: 'nim' },
            { data: 'title', name: 'judul' },
            { data: 'name', name: 'nama' },
            { data: 'prodi', name: 'prodi' },
            { data: 'file', name: 'berkas' },
            { data: 'score', name: 'nilai' },
            { data: 'detail', name: 'detail' },
        ]
    });
} );
$(document).ready( function () {
    $('#data-tabel2').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('dataDosen2') }}",
        columns: [
            { data: 'nim', name: 'nim' },
            { data: 'title', name: 'judul' },
            { data: 'name', name: 'nama' },
            { data: 'prodi', name: 'prodi' },
            { data: 'file', name: 'berkas' },
            { data: 'score', name: 'nilai' },
            { data: 'detail', name: 'detail' },
        ]
    });
} );
</script>
@endsection
