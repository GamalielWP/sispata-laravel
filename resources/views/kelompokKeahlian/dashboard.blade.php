@extends('dosen.sidebar')

@section('role')
    <h3 class="mb-3">Kelompok Keahlian {{$keahlian->scope}}</h3>
@endsection

@section('content')
    <div class="box-2">
        <div class="space">

        </div>
        <div class="container">
            <table class="table table-striped" id="data-tabel">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Judul</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Penguji</th>
                        <th>Berkas</th>
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
            ajax: "{{ route('dataKK') }}",
            columns: [
                { data: 'nim', name: 'nim' },
                { data: 'title', name: 'judul' },
                { data: 'name', name: 'nama' },
                { data: 'prodi', name: 'prodi' },
                { data: 'examiner_code', name: 'examiner_code' },
                { data: 'file', name: 'berkas' },
                { data: 'detail', name: 'detail' },
            ]
        });
    } );
</script>
@endsection
