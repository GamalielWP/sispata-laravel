@extends('dosen.sidebar')

@section('content')
    <table class="table table-striped" id="data-tabel">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role</th>
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
            ajax: "{{ route('data') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'nama' },
                { data: 'email', name: 'email' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'address', name: 'address' },
                { data: 'role', name: 'role' }
            ]
        });
    } );
</script>
@endsection
