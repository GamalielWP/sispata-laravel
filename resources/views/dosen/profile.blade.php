@extends('dosen.sidebar')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="">
                <label for="Nim" class="form-label">NIDN</label>
                <input name="Nim" class="form-control mb-2" type="text" value="18104010" disabled>
                
                <label for="Nama" class="form-label">Nama</label>
                <input name="Nama" class="form-control mb-2" type="text" value="Gamaliel Widhi Pradana" disabled>

                <label for="Email" class="form-label">Email</label>
                <input name="Email" class="form-control mb-2" type="text" value="18104010@ittelkom-pwt.ac.id">

                <label for="Phone" class="form-label">Nomor HP</label>
                <input name="Phone" class="form-control mb-2" type="text" value="085791666777">

                <label for="Prodi" class="form-label">Program Studi</label>
                <input name="Prodi" class="form-control mb-2" type="text" value="S1 Rekayasa Perangkat Lunak" disabled>
                
                <label for="Alamat" class="form-label">Alamat</label>
                <textarea id="Alamat" class="form-control mb-3" rows="3">Institut Teknologi Telkom Purwokerto Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147 (0281) 641629
                </textarea>

                <img src="{{asset('img/default-user.png')}}" style="width: 10%; height: auto; float:left; padding-bottom:0.5%" alt="Foto Profil" class="mr-2">
                <input name="FotoProfil" class="form-control mb-3" type="file">
                
                <hr>

                <label for="NewPass" class="form-label">Password Baru</label>
                <input name="NewPass" class="form-control mb-2" type="password">

                <label for="ConfirmPass" class="form-label">Ulangi Password</label>
                <input name="ConfirmPass" class="form-control mb-2" type="password">
                
                <hr>

                <label for="OldPass" class="form-label">Password Saat Ini</label>
                <input name="OldPass" class="form-control mb-2" type="password">

                <button type="button" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        
    </div>
@endsection