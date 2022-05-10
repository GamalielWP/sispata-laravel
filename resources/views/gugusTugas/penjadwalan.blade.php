@extends('dosen.sidebar')

@section('content')
    <table class="table table-striped" id="data-tabel">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Nama Mahasiswa</th>
                <th>Pembimbing 1</th>
                <th>Pembimbing 2</th>
                <th>Penguji</th>
                <th>Jadwal</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>1</td>
                    <td>Pengembangan Perangkat Lunak Dengan Metode Prototyping</td>
                    <td>Gamaliel Widhi Pradana</td>
                    <td>Nia Annisa Ferani Tanjung, S.Si., M.Sc</td>
                    <td>Nia Annisa Ferani Tanjung, S.Si., M.Sc</td>
                    <td>Nia Annisa Ferani Tanjung, S.Si., M.Sc</td>
                    <td>
                        <input type="date"  class="form-control mb-3" name="Tanggal" value="">
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Perancangan UI/UX Aplikasi Android</td>
                    <td>Haidar 'Adiy Dzaky</td>
                    <td>Nia Annisa Ferani Tanjung, S.Si., M.Sc</td>
                    <td>Nia Annisa Ferani Tanjung, S.Si., M.Sc</td>
                    <td>Nia Annisa Ferani Tanjung, S.Si., M.Sc</td>
                    <td>
                        <input type="date" class="form-control mb-3" name="Tanggal" value="">
                    </td>
                </tr>
        </tbody>
    </table>
@endsection

@section('table')
{{-- <script>
    $(document).ready( function () {
        $('#data-tabel').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'nama' }
            ]
        });
    } );
</script> --}}
@endsection
