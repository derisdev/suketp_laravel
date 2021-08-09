<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan PUSKESOS</title>
</head>

<body>
    <!-- KOP SURAT -->
    <table border="0" align="center" style="margin-top: 10px;" width=90%>
        <tr>
            <td width=14%><img src="{{ public_path('images/logo.png') }}" alt="" width="100" height="100">
            </td>
            <td>
                <center>
                    <font size="3">PEMERINTAH KABUPATEN GARUT</font> <br>
                    <font size="3">KECAMATAN CIKAJANG</font> <br>
                    <font size="5"><b>DESA MARGAMULYA</b></font> <br>
                    <font size="3"><i>Jl.Raya Cikandang, Cikajang - Garut Kode Pos 44171</i></font>
                </center>
            </td>
            <td width=14%><img src="{{ public_path('images/puskesos.png') }}" alt="" width="100" height="100">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr style="border: 2px; border-top:5px double">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <center>
                    <font size="3"><u><b>SURAT PERNYATAAN MISKIN</b></u></font><br>
                    {{-- <hr width="180" style="border-width: thin; margin-top: 0px;"> --}}
                    <font size="3">Nomor : {{ $puskesos->nosurat }}</font>
                </center>
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    Yang bertanda tangan di bawah ini :
                </p>
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83% >
        <!-- IDENTITAS PENGAJU -->
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td style="text-transform: uppercase;">{{ $puskesos->user->nama }}</td>
        </tr>
        <tr>
            <td>No Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $puskesos->user->nik }}</td>
        </tr>
        <tr>
            <td>No Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $puskesos->user->no_kk }}</td>
        </tr>
        <tr>
            <td>Tempat, tanggal lahir</td>
            <td>:</td>
            <td>{{ $puskesos->user->ttl }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $puskesos->user->jk }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $puskesos->user->agama }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $puskesos->user->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $puskesos->user->status }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $puskesos->user->alamat }}</td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    Bahwa saya benar-benar Penduduk Desa Margamulya Kec.Cikajang Kab Garut. Surat Pernyataan ini di buat untuk Permohonan <b>SKTM</b>
                </p>
                <p style="text-align: justify;">
                    Demikian surat pernyataan ini saya buat sebenarnya di sertai tanggung jawab dan apabila saya memberikan pernyataan tidak benar, maka saya sanggup di tuntut dengan peraturan dan hukum yang berlaku.
                </p>
            </td>
        </tr>
    </table>

    <br>

    {{-- TTD --}}
    <table border="0" align="center" width=83%>
        <tr>
            <td align="center" colspan="2">
               Mengetahui,
            </td>
            <td align="center">
                Margamulya, {{ $puskesos->updated_at->format('d F Y') }} <br>
               
            </td>
        </tr>
        <tr>
            <td align="center" width="30%">
                Ketua RW
                <br><br><br><br><br><br><br><br>
                <p align="center">(....................................)</p>
            </td>
            <td align="center" width="30%">
                Ketua RT
                <br><br><br><br><br><br><br><br>
                <p align="center">(....................................)</p>
            </td>
            <td align="center">
                Yang membuat pernyataan
                <br><br><br><br><br><br><br><br>
                <p align="center" style="text-transform: uppercase">({{ $puskesos->user->nama }})</p>
            </td>
        </tr>
    </table>

</body>

</html>