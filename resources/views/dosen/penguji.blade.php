@extends('dosen.sidebar')

@section('content')
    <table class="table table-striped" id="data-tabel">
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Judul</th>
                <th>Nama Mahasiswa</th>
                <th>Prodi</th>
                <th>Berkas</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>18104010</td>
                <td>Pengembangan Perangkat Lunak Dengan Metode Prototyping</td>
                <td>Gamaliel Widhi Pradana</td>
                <td>S1-Rekayasa Perangkat Lunak</td>
                <td>
                    <ul>
                        <li><a href="">18104010-proposal.pdf </a></li>
                        <li><a href="">18104010-berita-acara.pdf </a></li>
                    </ul>
                </td>
                <td>
                    <input type="number" class="form-control" value="90" min="0" max="100">
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>18104011</td>
                <td>Perancangan UI/UX Aplikasi Android</td>
                <td>Haidar 'Adiy Dzaky</td>
                <td>S1-Rekayasa Perangkat Lunak</td>
                <td>
                    <ul>
                        <li><a href="">18104010-proposal.pdf </a></li>
                        <li><a href="">18104010-berita-acara.pdf </a></li>
                    </ul>
                </td>
                <td>
                    <input type="number" class="form-control" value="0" min="0" max="100">
                </td>
            </tr>
        </tbody>
    </table>
@endsection

@section('table')

@endsection
