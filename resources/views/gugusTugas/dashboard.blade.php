@extends('dosen.sidebar')

@section('role')
    <h3 class="mb-3">Gugus Tugas {{Auth::user()->prodi}}</h3>
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
                        <th>Berkas</th>
                        <th>Status</th>
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
            ajax: "{{ route('dataGG') }}",
            columns: [
                { data: 'nim', name: 'nim' },
                { data: 'title', name: 'judul' },
                { data: 'name', name: 'nama' },
                { data: 'file', name: 'berkas' },
                { data: 'status', name: 'status' },
                { data: 'detail', name: 'detail' }
            ]
        });
    })
</script>
@endsection
