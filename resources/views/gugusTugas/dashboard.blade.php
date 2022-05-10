@extends('dosen.sidebar')

@section('role')
    <h3 class="mb-3">Gugus Tugas {{Auth::user()->prodi}}</h3>
@endsection

@section('content')
    <table class="table table-striped" id="data-tabel">
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Judul</th>
                <th>Nama Mahasiswa</th>
                <th>Berkas</th>
                <th>Track</th>
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
            ajax: "{{ route('dataGG') }}",
            columns: [
                { data: 'number', name: 'number' },
                { data: 'nim', name: 'nim' },
                { data: 'title', name: 'judul' },
                { data: 'name', name: 'nama' },
                { data: 'file', name: 'berkas' },
                { data: 'track', name: 'alur' },
                { data: 'detail', name: 'detail' }
            ]
        });
    })
</script>
@endsection
