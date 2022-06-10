@extends('mahasiswa.sidebar')

@section('content')
    <div class="card border-radius">
        <div class="card-body">
            <form action="/mahasiswa-file-updated/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="form-group col">
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                        <label for="Judul" class="form-label">Judul</label>
                        <input name="Judul" class="form-control @error('Judul') is-invalid @enderror mb-2" type="text" value="{{$sempro->title !=null ? $sempro->title : ''}}" placeholder="Ketik judul penelitian...">
                        @error('Judul')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        <label for="Schedule" class="form-label">Jadwal Seminar Proposal</label>
                        <input name="Schedule" type="date" class="form-control mb-3" value="{{$sempro->schedule !=null ? $sempro->schedule : ''}}" {{$sempro->schedule == null ? 'disabled' : ''}}>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <i class="fa fa-lightbulb-o"></i>
                        <label for="Pembimbing1" class="form-label">Pembimbing-1</label>
                        <select name="Pembimbing1" class="form-select {{$sempro->adviser1_code != null ? 'mb-3' : ''}}" aria-label="Pembimbing1 select" {{$sempro->adviser1_code != null ? 'disabled' : ''}}>
                            <option value="{{null}}" {{$sempro->adviser1_code == null ? 'selected' : ''}}>-- Belum ditentukan --</option>
                            @foreach ($dosen as $dos)
                                <option value="{{$dos->lecturer_code}}" {{$dos->lecturer_code == $sempro->adviser1_code ? 'selected' : ''}}>{{$dos->lecturer_code}} - {{$dos->user->name}}</option>
                            @endforeach
                        </select>
                        @error('Pembimbing1')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        @if ($sempro->adviser1_code == null)
                            <span class="mb-3" style="color: red">* kode dosen hanya dapat diinputkan 1 kali.</span>
                        @endif
                    </div>
    
                    <div class="form-group col">
                        <i class="fa fa-lightbulb-o"></i>
                        <label for="Pembimbing2" class="form-label">Pembimbing-2</label>
                        <select name="Pembimbing2" class="form-select {{$sempro->adviser2_code != null ? 'mb-3' : ''}}" aria-label="Pembimbing2 select" {{$sempro->adviser2_code != null ? 'disabled' : ''}}>
                            <option value="{{null}}" {{$sempro->adviser2_code == null ? 'selected' : ''}}>-- Belum ditentukan --</option>
                            @foreach ($dosen as $dos)
                                <option value="{{$dos->lecturer_code}}" {{$dos->lecturer_code == $sempro->adviser2_code ? 'selected' : ''}}>{{$dos->lecturer_code}} - {{$dos->user->name}}</option>
                            @endforeach
                        </select>
                        @error('Pembimbing2')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        @if ($sempro->adviser2_code == null)
                            <span class="mb-3" style="color: red">* kode dosen hanya dapat diinputkan 1 kali.</span><br>
                            <span class="mb-3" style="color: red">* isi dengan kode dosen Pembimbing 1 jika anda hanya memilih satu pembimbing saja.</span>
                        @endif
                    </div>
                </div>
                
                <div class="row center mb-3">
                    <div class="form-group col">
                        <label for="Form" class="form-label">
                            Form Perdaftaran <br>
                            <img class="doc-icon mb-2" src="{{asset('img/icon/forms.png')}}" alt="Form Perdaftaran">
                            <input name="Form" class="form-control file @error('Form') is-invalid @enderror" type="file" id="Form">
                            @error('Form')
                                <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        </label>
                        @if ($mhs->regis_form != null)
                            <a class="mb-3" href="{{$mhs->regis_form}}">{{$mhs->nim}}-form-pendaftaran.pdf</a> 
                        @endif
                    </div>
                    
                    <div class="form-group col">
                        <label for="ksm" class="form-label">
                            Kartu Studi Mahasiswa <br>
                            <img class="doc-icon mb-2" src="{{asset('img/icon/document.png')}}" alt="Kartu Studi Mahasiswa">
                            <input name="KSM" class="form-control file @error('KSM') is-invalid @enderror" type="file" id="ksm">
                            @error('KSM')
                                <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        </label>
                        @if ($mhs->ksm != null)
                            <a class="mb-3" href="{{$mhs->ksm}}">{{$mhs->nim}}-KSM.pdf</a> 
                        @endif
                    </div>
                    
                    <div class="form-group col">
                        <label for="Transkrip" class="form-label">
                            Transkrip Nilai Sementara <br>
                            <img class="doc-icon mb-2" src="{{asset('img/icon/score.png')}}" alt="Transkrip Nilai Sementara">
                            <input name="Transkrip" class="form-control file @error('Transkrip') is-invalid @enderror" type="file" id="Transkrip">
                            @error('Transkrip')
                                <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        </label>
                        @if ($mhs->temp_transcript != null)
                            <a class="mb-3" href="{{$mhs->temp_transcript}}">{{$mhs->nim}}-transkrip-nilai-sementara.pdf</a> 
                        @endif                   
                    </div>
                </div>

                <div class="row center mb-3">
                    <div class="form-group col">
                        <label for="Pengesahan" class="form-label">
                            Lembar Pengesahan <br>
                            <img class="doc-icon mb-2" src="{{asset('img/icon/validation.png')}}" alt="Lembar Pengesahan">
                            <input name="Pengesahan" class="form-control file @error('Pengesahan') is-invalid @enderror" type="file" id="Pengesahan">
                            @error('Pengesahan')
                                <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        </label>
                        @if ($mhs->validity_sheet != null)
                            <a class="mb-3" href="{{$mhs->validity_sheet}}">{{$mhs->nim}}-form-lembar-pengesahan.pdf</a> 
                        @endif              
                    </div>
    
                    <div class="form-group col">
                        <label for="Proposal" class="form-label">
                            Proposal TA 1 <br>
                            <img class="doc-icon mb-2" src="{{asset('img/icon/proposal.png')}}" alt="Proposal TA 1">
                            <input name="Proposal" class="form-control file @error('Proposal') is-invalid @enderror" type="file" id="Proposal">
                            @error('Proposal')
                                <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        </label>
                        @if ($mhs->thesis_proposal != null)
                            <a class="mb-3" href="{{$mhs->thesis_proposal}}">{{$mhs->nim}}-proposal.pdf</a> 
                        @endif                
                    </div>

                    <div class="col">
                        @if ($sempro->news_doc != null)
                            <div class="form-group">
                                <label for="BeritaAcara" class="form-label">
                                    Berita Acara <br>
                                    <img class="doc-icon mb-2" src="{{asset('img/icon/envelope.png')}}" alt="Berita Acara"> <br>
                                    <a href="/mahasiswa-file-download/{{$mhs->user_id}}" class="btn btn-outline-success">
                                        <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                        Download
                                    </a>
                                </label>
                                <a class="mb-3" href="{{$sempro->news_doc}}">{{$mhs->nim}}-berita-acara.pdf</a> 
                            </div>
                        @endif
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Simpan
                </button>
                <span style="color: red">* harap inputkan data sekaligus.</span><br>
            </form>
        </div>
        
    </div>
@endsection

@section('styleScript')
    <script>
        let input = document.getElementById("Form");
        let fileName = document.getElementById("formName");

        input.addEventListener("change", ()=>{
            let inputFile = document.querySelector("input[type=file]").files[0];

            fileName.innerText = inputFile.name;
        });

        let inpu = document.getElementById("ksm");
        let fileNam = document.getElementById("ksmName");

        inpu.addEventListener("change", ()=>{
            let inputFil = document.querySelector("input[type=file]").files[0];

            fileNam.innerText = inputFil.name;
        })
    </script>
@endsection