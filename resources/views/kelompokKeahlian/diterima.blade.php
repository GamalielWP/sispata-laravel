@extends('kelompokKeahlian.sidebar')

@section('content')
    <table class="table table-striped" id="data-tabel">
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Judul</th>
                <th>Nama Mahasiswa</th>
                <th>Prodi</th>
                <th>Pembimbing</th>
                <th>Penguji</th>
                <th>Berkas</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>18104010</td>
                <td>Pengembangan Perangkat Lunak Dengan Metode Prototyping</td>
                <td>Gamaliel Widhi Pradana</td>
                <td>S1-Rekayasa Perangkat Lunak</td>
                <td>Nia Annisa Ferani Tanjung, S.Si., M.Sc</td>
                <td>Nia Annisa Ferani Tanjung, S.Si., M.Sc</td>
                <td>
                    <ul>
                        <li><a href="">18104010-proposal.pdf</a></li>
                    </ul>
                </td>
                <td>Diterima</td>
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
