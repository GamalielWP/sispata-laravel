@extends('dosen.sidebar')

@section('content')
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
        <a class="nav-link {{'dosen-pembimbing-1' == request()->path() ? 'active on' : ''}}" aria-current="page" href="/dosen-pembimbing-1">Pembimbing 1</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{'dosen-pembimbing-2' == request()->path() ? 'active on' : ''}}" href="/dosen-pembimbing-2">Pembimbing 2</a>
        </li>
    </ul>

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
            $('#data-tabel2').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dataDosenPembimbing2') }}",
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