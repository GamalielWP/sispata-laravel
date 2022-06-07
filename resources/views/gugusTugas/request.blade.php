@extends('dosen.sidebar')

@section('role')
    <h3 class="mb-3">Gugus Tugas {{Auth::user()->prodi}}</h3>
@endsection

@section('content')
    <div class="card border-radius">
        <div class="card-body">
            <table class="table table-striped" id="data-tabel">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Email</th>
                        <th>Nomor HP</th>
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
            ajax: "{{ route('dataGGRequest') }}",
            columns: [
                { data: 'nim', name: 'nim' },
                { data: 'name', name: 'nama' },
                { data: 'email', name: 'email' },
                { data: 'phone_number', name: 'phone' },
                { data: 'action', name: 'action' }
            ]
        });
    })
</script>
@endsection
