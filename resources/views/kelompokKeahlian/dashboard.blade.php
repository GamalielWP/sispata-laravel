@extends('dosen.sidebar')

@section('role')
    <h3 class="mb-3">Kelompok Keahlian {{$keahlian->scope}}</h3>
@endsection

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
            {{-- <tr>
                <td>1</td>
                <td>18104010</td>
                <td>Pengembangan Perangkat Lunak dengan Metode Prototyping</td>
                <td>Gamaliel Widhi Pradana</td>
                <td>S1-Rekayasa Perangkat Lunak</td>
                <td>
                    <ol>
                        <li>
                            <input name="Pembimbing-1" value="Nia Annisa Ferani Tanjung, S.Si., M.Sc" class="form-control mb-3" list="dosen" id="exampleDataList" placeholder="Ketik untuk mencari...">
                            <datalist id="dosen">
                                <option value="Nia Annisa Ferani Tanjung, S.Si., M.Sc">
                                <option value="Dosen 2">
                                <option value="Dosen 3">
                            </datalist>
                        </li>
                        <li>
                            <input name="Pembimbing-2" value="Nia Annisa Ferani Tanjung, S.Si., M.Sc" class="form-control mb-3" list="dosen" id="exampleDataList" placeholder="Ketik untuk mencari...">
                            <datalist id="dosen">
                                <option value="Nia Annisa Ferani Tanjung, S.Si., M.Sc">
                                <option value="Dosen 2">
                                <option value="Dosen 3">
                            </datalist>
                        </li>
                    </ol>
                </td>
                <td>
                    <ol>
                        <li>
                            <input name="Pembimbing-1" value="Nia Annisa Ferani Tanjung, S.Si., M.Sc" class="form-control mb-3" list="dosen" id="exampleDataList" placeholder="Ketik untuk mencari...">
                            <datalist id="dosen">
                                <option value="Nia Annisa Ferani Tanjung, S.Si., M.Sc">
                                <option value="Dosen 2">
                                <option value="Dosen 3">
                            </datalist>
                        </li>
                    </ol>
                </td>
                <td>
                    <ul>
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
                <td>S1-Rekayasa Perangkat Lunak</td>
                <td>
                    <ol>
                        <li>
                            <input name="Pembimbing-1" value="Nia Annisa Ferani Tanjung, S.Si., M.Sc" class="form-control mb-3" list="dosen" id="exampleDataList" placeholder="Ketik untuk mencari...">
                            <datalist id="dosen">
                                <option value="Nia Annisa Ferani Tanjung, S.Si., M.Sc">
                                <option value="Dosen 2">
                                <option value="Dosen 3">
                            </datalist>
                        </li>
                        <li>
                            <input name="Pembimbing-2" value="Nia Annisa Ferani Tanjung, S.Si., M.Sc" class="form-control mb-3" list="dosen" id="exampleDataList" placeholder="Ketik untuk mencari...">
                            <datalist id="dosen">
                                <option value="Nia Annisa Ferani Tanjung, S.Si., M.Sc">
                                <option value="Dosen 2">
                                <option value="Dosen 3">
                            </datalist>
                        </li>
                    </ol>
                </td>
                <td>
                    <ol>
                        <li>
                            <input name="Pembimbing-1" value="" class="form-control mb-3" list="dosen" id="exampleDataList" placeholder="Ketik untuk mencari...">
                            <datalist id="dosen">
                                <option value="Nia Annisa Ferani Tanjung, S.Si., M.Sc">
                                <option value="Dosen 2">
                                <option value="Dosen 3">
                            </datalist>
                        </li>
                    </ol>
                </td>
                <td>
                    <ul>
                        <li><a href="">18104011-proposal.pdf</a></li>
                    </ul>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-warning">Kirim</button>
                      </div>
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
            ajax: "{{ route('dataKK') }}",
            columns: [
                { data: 'number', name: 'number' },
                { data: 'nim', name: 'nim' },
                { data: 'title', name: 'judul' },
                { data: 'name', name: 'nama' },
                { data: 'prodi', name: 'prodi' },
            ]
        });
    } );
</script>
@endsection
