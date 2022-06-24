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
                <td>NIDN</td>
                <td>:</td>
                <td>{{$penguji->nidn}}</td>
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
                <td>NIDN</td>
                <td>:</td>
                <td>{{$pembimbing1->nidn}}</td>
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
                    <td>NIDN</td>
                    <td>:</td>
                    <td>{{$pembimbing2->nidn}}</td>
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
                <td class="center">{{ $nilai_3 = $score3->ide + $score3->solusi + $score3->analisa + $score3->penulisan + $score3->kemandirian_presentasi }}</td>
                <td class="center">{{ $total_3 = ($nilai_3/100)*50 }}</td>
            </tr>
            <tr>
                <td>Pembimbing Utama</td>
                <td class="center">{{ $sempro->adviser2_code != null && $sempro->adviser1_code != $sempro->adviser2_code ? "25" : "50" }}</td>
                <td class="center">{{ $nilai_1 = $score1->ide + $score1->solusi + $score1->analisa + $score1->penulisan + $score1->kemandirian_presentasi }}</td>
                <td class="center">{{ $sempro->adviser2_code != null && $sempro->adviser1_code != $sempro->adviser2_code ? $total_1 = ($nilai_1/100)*25 : $total_1 = ($nilai_1/100)*50 }}</td>
            </tr>
            @if ($sempro->adviser2_code != null && $sempro->adviser1_code != $sempro->adviser2_code)
                <tr>
                    <td>Pembimbing Pendamping</td>
                    <td class="center">25</td>
                    <td class="center">{{ $nilai_2 = $score2->ide + $score2->solusi + $score2->analisa + $score2->penulisan + $score2->kemandirian_presentasi }}</td>
                    <td class="center">{{ $total_2 =($nilai_2/100)*25 }}</td>
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
                <td>
                {{QrCode::size(100)->generate($penguji->nidn)}}
                </td>
                <td>
                {{QrCode::size(100)->generate($pembimbing1->nidn)}}
                </td>
                <td>
                {{QrCode::size(100)->generate($pembimbing2->nidn)}}
                </td>
            </tr>
        </table>

    </div>
</body>
</html>