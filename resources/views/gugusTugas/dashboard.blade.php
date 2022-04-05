@extends('dosen.sidebar')

@section('content')
    <table class="table table-striped" id="data-tabel">
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Judul</th>
                <th>Nama Mahasiswa</th>
                <th>Kelompok Keahlian</th>
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
                    <td>
                        <input name="KelompokKeahlian" value="Nia Annisa Ferani Tanjung, S.Si., M.Sc" class="form-control mb-3" list="dosen" id="exampleDataList" placeholder="Ketik untuk mencari...">
                        <datalist id="dosen">
                            <option value="Nia Annisa Ferani Tanjung, S.Si., M.Sc">
                            <option value="Dosen 2">
                            <option value="Dosen 3">
                        </datalist>
                    </td>
                    <td>
                        <ul>
                            <li><a href="">18104010-form-pendaftaran.pdf</a></li>
                            <li><a href="">18104010-form-lembar-pengesahan.pdf</a></li>
                            <li><a href="">18104010-KSM.pdf</a></li>
                            <li><a href="">18104010-transkrip-nilai-sementara.pdf</a></li>
                            <li><a href="">18104010-proposal.pdf</a></li>
                        </ul>
                    </td>
                    <td>Terkirim</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>18104011</td>
                    <td>Perancangan UI/UX Aplikasi Android</td>
                    <td>Haidar 'Adiy Dzaky</td>
                    <td>
                        <input name="KelompokKeahlian" class="form-control mb-3" list="dosen" id="exampleDataList" placeholder="Ketik untuk mencari...">
                        <datalist id="dosen">
                            <option value="Nia Annisa Ferani Tanjung, S.Si., M.Sc">
                            <option value="Dosen 2">
                            <option value="Dosen 3">
                        </datalist>
                    </td>
                    <td>
                        <ul>
                            <li><a href="">18104010-form-pendaftaran.pdf</a></li>
                            <li><a href="">18104010-form-lembar-pengesahan.pdf</a></li>
                            <li><a href="">18104010-KSM.pdf</a></li>
                            <li><a href="">18104010-transkrip-nilai-sementara.pdf</a></li>
                            <li><a href="">18104010-proposal.pdf</a></li>
                        </ul>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning">Kirim</button>
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
