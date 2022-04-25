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

@section('modal')
    <div class="modal fade" id="scopeModal" tabindex="-1" aria-labelledby="scopeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Bidang Keahlian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="modalForm">
                    <div class="modal-body">
                        <select class="form-select" aria-label="Scope select">
                            @foreach ($bidang as $bd)
                                <option id="bidang" name="bidang" value="{{$bd->id}}">{{$bd->scope}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" id="submit" class="btn btn-success">Kirim</button>
                    </div>
                </form>
            </div>
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
                { data: 'number', name: 'number' },
                { data: 'nim', name: 'nim' },
                { data: 'title', name: 'judul' },
                { data: 'name', name: 'nama' },
                { data: 'scope', name: 'bidang' },
                { data: 'file', name: 'berkas' },
                { data: 'track', name: 'alur' }
            ]
        });

        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var exampleModal = document.getElementById('scopeModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var id = button.getAttribute('data-bs-user')
            var bidang = $("#bidang").val()
        
            $.ajax({
                url: '/gugus-tugas-do-scope/' + id,
                type: "PATCH",
                data: {
                    id: id,
                    bidang: bidang,
                },
                dataType: 'json',
                success: function (data) {
                    
                    $('#modalForm').trigger("reset");
                    $('#scopeModal').modal('hide');
                    
                }
            });
        });
    } );
        
</script>
@endsection
