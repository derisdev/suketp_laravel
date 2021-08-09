<!DOCTYPE html>
<html>

<head>
    <title>Surat Kuasa</title>
</head>

<body>
    <!-- KOP SURAT -->
    <table border="0" align="center" style="margin-top: 5px;" width=84%>
        <tr>
            <td colspan="2">
                <br>
                <center>
                    <font size="3"><u><b style="text-transform: uppercase;">SURAT KUASA</b></u></font><br>
                    {{-- <font size="3">NO: {{ $ajuan->nosurat }}</font> --}}
                </center>
                <br>
            </td>
        </tr>
    </table>


    <table border="0" align="center" width=83% >
        <!-- PIHAK KESATU -->
        <tr>
            <td>Yang bertanda tangan di bawah ini:</td>
        </tr>
        <tr>
            <td width=46%>Nama Lengkap</td>
            <td width=2%>:</td>
            <td style="text-transform: uppercase;">{{ $ajuan->user->nama }}</td>
        </tr>
        <tr>
            <td>Nomor Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $ajuan->user->nik }}</td>
        </tr>
        <tr>
            <td>Nomor Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $ajuan->user->no_kk }}</td>
        </tr>
        <tr>
            <td>Tempat, tanggal lahir</td>
            <td>:</td>
            <td>{{ $ajuan->user->ttl }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $ajuan->user->alamat }}</td>
        </tr>
        <tr>
            <td>(Selanjutnya disebut PIHAK KESATU)</td>
        </tr>
    </table>

    <br><br>
    <table border="0" align="center" width=83% >
        <!-- PIHAK KEDUA -->
        <tr>
            <td width=46%>Nama Lengkap</td>
            <td width=2%>:</td>
            <td style="text-transform: uppercase;">{{ $ajuan->kuasa->nama }}</td>
        </tr>
        <tr>
            <td>Nomor Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $ajuan->kuasa->nik }}</td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td>{{ $ajuan->kuasa->umur }} Tahun</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $ajuan->kuasa->pekerjaan }}</td>
        </tr>
        <tr>
            <td>(Selanjutnya disebut PIHAK KESATU)</td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    Pada {{ $ajuan->updated_at->format('d F Y') }}, PIHAK KESATU memberikan kuasa kepada PIHAK KEDUA 
                </p>
                <p style="text-align: center;">
                    <b style="text-transform: uppercase;">
                        {{ $ajuan->keterangan }}
                    </b>
                </p>
                <p style="text-align: justify;">
                    Apabila saya melanggar dan memberikan keterangan palsu, saya bersedia dikenakan sanksi serta dituntut pidana sesuai ketentuan peraturan perundang-undangan yang berlaku.
                </p>
                <p style="text-align: justify;">
                    Demikian surat izin yang saya buat dengan sebenarnya tanpa ada paksaan dan tekanan dari pihak manapun.
                </p>
            </td>
        </tr>
    </table>

    <br>

    {{-- TTD --}}
    <table border="0" align="center">
        <tr>
            <td style="text-align:center; position:relative;" width=35%>
                Yang bersangkutan<br><br><br><br><br>
                <u>{{ $ajuan->kuasa->nama }}</u>
            </td>
            
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>
            <td>
               &nbsp;
            </td>

            <td style="text-align:center; position:relative;" width=35%>
                Garut, {{ $ajuan->updated_at->format('d F Y') }}<br><br><br><br><br>
                <u>{{ $ajuan->user->nama }}</u>
            </td>
        </tr>
    </table>
    <br>
    <table border="0" align="center" width=30%>
        <tr>
            <td style="text-align: center; position:relative">
                Mengetahui<br>
                Kepala Desa Margamulya <br>
                <img src="{{ public_path('storage/ttdcap/'.$ajuan->ttd.'') }}" alt="" height="129" align="center" style="position:absolute; top:10; right:0 "> <br><br><br><br>
                <p  align="center">{{ $ajuan->kades }}</p>
            </td>
        </tr>
    </table>

</body>

</html>