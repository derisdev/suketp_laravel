<!DOCTYPE html>
<html>

<head>
    <title>Surat Pengantar Izin Rame-Rame</title>
</head>

<body>
    <table border="0" align="center" width=85% >
        <!-- IDENTITAS PENGAJU -->
        <tr>
            <td align="center" colspan="3">
                <font size="3"><u><b>SURAT PERNYATAAN MENETAP</b></u></font><br>
                <font size="3">NO SURAT : {{ $ajuan->nosurat }}</font>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="3">Yang bertanda tangan di bawah ini, Kepala Desa Margamulya Kecamatan Cikajang Kabupaten Garut, menerangkan dengan sebenarnya bahwa :</td>
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
            <td colspan="3">
                <p>Dengan ini menyatakan bahwa saya telah menetap di alamat tersebut sejak tanggal {{ $ajuan->domisili->tanggal }} dan tidak pernah didata di daerah manapun.</p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                Surat pernyataan ini digunakan untuk : {{ $ajuan->keterangan }}
            </td>
            
        </tr>
        <tr>
            <td colspan="3">
                Demikian pernyataan ini saya buat dengan sebenarnya dan apabila saya memberikan keterangan palsu, saya siap dituntut secara hukum.
            </td>
        </tr>
        </table>
        <br>


    {{-- TTD --}}
    <table border="0" align="center">
        <tr>
            <td colspan="2" align="center">Mengetahui</td>
            <td colspan="1" align="center">Garut, {{ $ajuan->updated_at->format('d F Y') }}</td>
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
            <div style="position: relative;
            left: -30px;"> Margamulya, {{ $ajuan->updated_at->format('d F Y') }} <br>
                Kepala Desa Margamulya</div>
            <img src="{{ asset('ttdcap/'.$ajuan->ttd).''}}" alt="" height="280" align="right" style="position:absolute; top:-30"> <br><br><br><br>
            <p style="position:absolute; right:-170 !important;top:120">{{ $ajuan->kades }}</p>
            </td>
        </tr>
        
    </table>

</body>

</html>