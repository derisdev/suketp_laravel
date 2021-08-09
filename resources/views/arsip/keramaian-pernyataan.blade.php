<!DOCTYPE html>
<html>

<head>
    <title>Surat Pengantar Izin Rame-Rame</title>
</head>

<body>
    <!-- KOP SURAT -->
    {{-- <table border="0" align="center" style="margin-top:5px;" width=95%>
        <tr>
            <td width=14%><img src="{{ public_path('images/logo.png') }}" alt="" width="85" height="85">
            </td>
            <td>
                <center>
                    <font size="3">PEMERINTAH KABUPATEN GARUT</font> <br>
                    <font size="3">KECAMATAN CIKAJANG</font> <br>
                    <font size="5"><b>DESA MARGAMULYA</b></font> <br>
                    <font size="3"><i>Jl.Raya Cikandang, Cikajang - Garut Kode Pos 44171</i></font>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="border: 2px; border-top:5px double">
            </td>
        </tr>
    </table> --}}

    <table border="0" align="center" width=85% >
        <!-- IDENTITAS PENGAJU -->
        <tr>
            <td align="center" colspan="3">
                <font size="3"><u><b>SURAT PERNYATAAN</b></u></font><br>
                <font size="3">NO SURAT : {{ $ajuan->nosurat }}</font>
            </td>
        </tr>
        <tr>
            <td colspan="3">Yang bertanda tangan di bawah ini, Kepala Desa Margamulya Kecamatan Cikajang Kabupaten Garut , menerangkan dengan sebenarnya bahwa :</td>
        </tr>
        <tr>
            <td width=32%>Nama</td>
            <td width=0%>:</td>
            <td style="text-transform: uppercase;" width=68%>{{ $ajuan->user->nama }}</td>
        </tr>
        <tr>
            <td>No Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $ajuan->user->nik }}</td>
        </tr>
        <tr>
            <td>No Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $ajuan->user->no_kk }}</td>
        </tr>
        <tr>
            <td>Tempat, tanggal lahir</td>
            <td>:</td>
            <td>{{ $ajuan->user->ttl }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $ajuan->user->jk }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $ajuan->user->agama }}</td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>{{ $ajuan->user->pendidikan }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $ajuan->user->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $ajuan->user->status }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $ajuan->user->alamat }}</td>
        </tr>
        <tr>
            <td>Maksud dan tujuan</td>
            <td>:</td>
            <td>{{ $ajuan->keterangan }}</td>
        </tr>
        <tr>
            <td>Waktu dan tempat</td>
            <td>:</td>
            <td>{{ $ajuan->izinKeramaian->hari }}, {{ $ajuan->izinKeramaian->tanggal }}, berlokasi di {{ $ajuan->izinKeramaian->tempat }}</td>
        </tr>
        {{-- himbauan --}}
        <tr>
            <td colspan="3">
                <p>Dengan ini menyatakan bahwa saya bersedia mentaati segala peraturan perundangundangan yang belaku serta akan menjaga kemananan dan ketertiban saat acara rame-rame tersebut berjalan</p>
                <p>Demikian pernyataan ini saya buat dengan sebenarnya dan apabila saya memberikan keterangan palsu, saya siap dituntut secara hukum. </p>
            </td>
        </tr>
        </table>


    {{-- TTD --}}
    <table border="0" align="center">
        <tr>
            <td colspan="2" align="center">Mengetahui</td>
            <td colspan="1" align="center">Bandung, {{ $ajuan->updated_at->format('d F Y') }}</td>
        </tr>
        <tr>
            <td style="text-align:center; position:relative;" width=35%>
                Ketua RT<br><br><br><br><br><br>
                <u>.........................................</u>
            </td>

            <td style="text-align:center; position:relative;" width=35%>
                Ketua RW<br><br><br><br><br><br>
                <u>.........................................</u>
            </td>
            
            <td style="text-align:center; position:relative;" width=35%>
                Yang membuat pernyataan<br><br><br><br><br><br>
                <u>.........................................</u>
            </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        {{-- baris kedua ttd --}}
        <tr>
            <td colspan="2" align="center">&nbsp;</td>
            <td colspan="1" align="center">Mengetahui</td>
        </tr>
        <tr>
            <td style="text-align:center; position:relative;" width=35%>
                Kepala Dusun<br><br><br><br><br><br><br>
                <u>.........................................</u>
            </td>

             <td style="text-align:center; position:relative;" width=35%>
                Kaur Pemerintahan<br><br><br><br><br><br><br>
                <u>.........................................</u>
            </td>
            
            <td style="text-align:center; position:relative" width=80%>
                Kepala Desa Margamulya <br>
                <img src="{{ public_path('storage/ttdcap/'.$ajuan->ttd.'') }}" height="120" width="" align="right" style="position:absolute; top:10; right: 4 "> <br><br><br><br><br>
                <u style="text-align:center; line-height:0">{{ $ajuan->kades }}</u>
            </td>
        </tr>
        
    </table>

</body>

</html>