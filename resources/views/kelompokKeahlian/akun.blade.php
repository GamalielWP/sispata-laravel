@extends('kelompokKeahlian.sidebar')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="">
                <label for="NewPass" class="form-label">Password Baru</label>
                <input name="NewPass" class="form-control mb-2" type="password">

                <label for="ConfirmPass" class="form-label">Ulangi Password</label>
                <input name="ConfirmPass" class="form-control mb-2" type="password">

                <label for="OldPass" class="form-label">Password Saat Ini</label>
                <input name="OldPass" class="form-control mb-2" type="password">

                <button type="button" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection