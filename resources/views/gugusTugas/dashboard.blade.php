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
                <th>Bidang Keahlian</th>
                <th>Berkas</th>
                <th>Track</th>
            </tr>
        </thead>
        <tbody>
                {{-- <tr>
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
                </tr> --}}
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
                { data: 'name', name: 'nama' }
            ]
        });
    } );
</script>
@endsection
