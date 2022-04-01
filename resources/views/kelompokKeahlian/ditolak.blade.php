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
                <td>181040111</td>
                <td>Perancangan UI/UX Manusia Android</td>
                <td>Sasuke Dragon Ball</td>
                <td>S1-Rekayasa Perangkat Lunak</td>
                <td>
                    <ol>
                        <li>
                            Nia Annisa Ferani Tanjung, S.Si., M.Sc
                        </li>
                        <li>
                            Nia Annisa Ferani Tanjung, S.Si., M.Sc
                        </li>
                    </ol>
                </td>
                <td>
                    <ol>
                        <li>
                            <input name="Penguji" value="Nia Annisa Ferani Tanjung, S.Si., M.Sc" class="form-control mb-3" list="dosen" id="exampleDataList" placeholder="Ketik untuk mencari...">
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
                        <li><a href="">181040111-proposal.pdf</a></li>
                    </ul>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-warning">Ajukan Lagi</button>
                      </div>
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
