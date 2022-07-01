@extends('dosen.sidebar')

@section('role')
    <h3 class="mb-3">Gugus Tugas {{Auth::user()->prodi}}</h3>
@endsection

@section('content')
    <div class="card border-radius">
        <div class="card-body">
            <a href="/gugus-tugas-data-table-clean" class="fa fa-trash btn btn-danger border-radius mb-3"> Hapus data usang</a>
            <table class="table table-striped" id="data-tabel">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Berkas</th>
                        <th>Jadwal</th>
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
                { data: 'name', name: 'nama' },
                { data: 'file', name: 'berkas' },
                { data: 'schedule', name: 'jadwal' },
                { data: 'status', name: 'status' },
                { data: 'detail', name: 'detail' }
            ]
        });
    })
</script>
@endsection
