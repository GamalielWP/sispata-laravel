@extends('dosen.sidebar')

@section('content')
    <div class="card border-radius">
        <div class="card-body container">
            <table class="table table-striped" id="data-tabel">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Berkas</th>
                        <th>Jadwal</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('table')
<script>
$(document).ready( function () {
    $('#data-tabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('dataDosenPenguji') }}",
        columns: [
            { data: 'nim', name: 'nim' },
            { data: 'name', name: 'nama' },
            { data: 'prodi', name: 'prodi' },
            { data: 'file', name: 'berkas' },
            { data: 'schedule', name: 'jadwal' },
            { data: 'score', name: 'nilai' },
            { data: 'detail', name: 'detail' },
        ]
    });
} );
</script>
@endsection
