<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="icon" href="{{ asset('img/icon/envelope.png') }}"> --}}
    <title>{{ $mhs->user_id.'-'.$mhs->nim.'-Berita-Acara'.'.pdf' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    {{-- <link href="{{ asset('css/file.css') }}" rel="stylesheet"> --}}
    <style type="text/css">
        .font {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="font">
        <div class="row">
            <div class="col">
                {{-- <img src="{{ asset('img/ittp.png') }}" class="img-cop"> --}}
                <span class="center" style="float: center; margin-left: 130px;">
                    <br>
                    LEMBAR PENILAIAN GABUNGAN TUGAS AKHIR I
                    <br>
                    FAKULTAS INFORMATIKA-INSTITUT TEKNOLOGI TELKOM PURWOKERTO
                </span>
            </div>
        </div>

        {{-- <hr> --}}
        <br>

        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{$penguji->user->name}}</td>
            </tr>
            <tr>
                <td>NIDN / NIK</td>
                <td>:</td>
                <td>{{$penguji->nidn != null ? $penguji->nidn : '-'}} / {{$penguji->nik != null ? $penguji->nik : '-'}}</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>{{$penguji->user->prodi}}</td>
            </tr>
            <tr>
                <td>Peran</td>
                <td>:</td>
                <td>Penguji</td>
            </tr>
        </table>
    
        <br>
    
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{$pembimbing1->user->name}}</td>
            </tr>
            <tr>
                <td>NIDN / NIK</td>
                <td>:</td>
                <td>{{$pembimbing1->nidn != null ? $pembimbing1->nidn : '-'}} / {{$pembimbing1->nik != null ? $pembimbing1->nik : '-'}}</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>{{$pembimbing1->user->prodi}}</td>
            </tr>
            <tr>
                <td>Peran</td>
                <td>:</td>
                <td>Pembimbing Utama</td>
            </tr>
        </table>

        @if ($sempro->adviser2_code != null && $sempro->adviser2_code != $sempro->adviser1_code)
        <br>
            <table>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td>{{$pembimbing2->user->name}}</td>
                </tr>
                <tr>
                    <td>NIDN / NIK</td>
                    <td>:</td>
                    <td>{{$pembimbing2->nidn != null ? $pembimbing2->nidn : '-'}} / {{$pembimbing2->nik != null ? $pembimbing2->nik : '-'}}</td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td>{{$pembimbing2->user->prodi}}</td>
                </tr>
                <tr>
                    <td>Peran</td>
                    <td>:</td>
                    <td>Pembimbing Pendamping</td>
                </tr>
            </table>
        @endif
        
        <br>
    
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{$mhs->user->name}}</td>
            </tr>
            <tr>
                <td>NIM / Program Studi</td>
                <td>:</td>
                <td>{{$mhs->nim}} / {{$mhs->user->prodi}}</td>
            </tr>
            <tr>
                <td>Judul Tugas Akhir</td>
                <td>:</td>
                <td>{{$sempro->title}}</td>
            </tr>
            <tr>
                <td>Tanggal Pelaksanaan</td>
                <td>:</td>
                <td>{{$jadwal}}</td>
            </tr>
        </table>

        <br>

        <table class="table table-bordered border-dark">
            <tr class="center">
                <th>Penilai</th>
                <th>Persentase</th>
                <th>Nilai Skala 100</th>
                <th>Nilai Pembobotan</th>
            </tr>
            <tr>
                <td>Penguji</td>
                <td class="center">50</td>
                <td class="center">{{ $sempro->examiner_score }}</td>
                <td class="center">{{ $total_3 = ($sempro->examiner_score/100)*50 }}</td>
            </tr>
            <tr>
                <td>Pembimbing Utama</td>
                <td class="center">{{ $sempro->adviser2_code != null && $sempro->adviser1_code != $sempro->adviser2_code ? "25" : "50" }}</td>
                <td class="center">{{ $sempro->adviser1_score }}</td>
                <td class="center">{{ $sempro->adviser2_code != null && $sempro->adviser1_code != $sempro->adviser2_code ? $total_1 = ($sempro->adviser1_score/100)*25 : $total_1 = ($sempro->adviser1_score/100)*50 }}</td>
            </tr>
            @if ($sempro->adviser2_code != null && $sempro->adviser1_code != $sempro->adviser2_code)
                <tr>
                    <td>Pembimbing Pendamping</td>
                    <td class="center">25</td>
                    <td class="center">{{ $sempro->adviser2_score }}</td>
                    <td class="center">{{ $total_2 =($sempro->adviser2_score/100)*25 }}</td>
                </tr>
            @endif
            <tr>
                <th class="center" colspan="3">TOTAL NILAI TA 1</th>
                <td class="center">{{ $sempro->adviser2_code != null && $sempro->adviser1_code != $sempro->adviser2_code ? $total_1 + $total_2 + $total_3 : $total_1 + $total_3 }}</td>
            </tr>
        </table>

        <br>

        <table class="table table-borderless">
            <tr>
                <td class="center">
                    <span>Penguji</span><br>
                    <span>{{$penguji->user->name}}</span>
                </td>
                <td class="center">
                    <span>Pembimbing Utama</span><br>
                    <span>{{$pembimbing1->user->name}}</span>
                </td>
                @if ($sempro->adviser2_code != null && $sempro->adviser1_code != $sempro->adviser2_code)
                    <td class="center">
                        <span>Pembimbing Pendamping</span><br>
                        <span>{{$pembimbing2->user->name}}</span>
                    </td>
                @endif
            </tr>
            <tr>
                <td class="center">
                    <img src="{{$penguji->signature != null ? asset($penguji->signature) : 'img/default-sig.png'}}" alt="TTD" width="125px">
                </td>
                <td class="center">
                    <img src="{{$pembimbing1->signature != null ? asset($pembimbing1->signature) : 'img/default-sig.png'}}" alt="TTD" width="125px">
                </td>
                @if ($sempro->adviser2_code != null && $sempro->adviser1_code != $sempro->adviser2_code)
                    <td class="center">
                        <img src="{{$pembimbing2->signature != null ? asset($pembimbing2->signature) : 'img/default-sig.png'}}" alt="TTD" width="125px">
                    </td>
                @endif
            </tr>
        </table>

    </div>
</body>
</html>