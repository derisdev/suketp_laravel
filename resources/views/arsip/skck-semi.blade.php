<!DOCTYPE html>
<html>

<head>
    <title>SKCK - {{ $skck->user->nama }}</title>
</head>

<body>
    <!-- KOP SURAT -->
    <table border="0" align="center" style="margin-top: 10px;" width=84%>
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
    </table>

    

    <table border="0" align="center" width=83% >
        <!-- IDENTITAS PENGAJU -->
        <tr>
            <td align="center" colspan="3">
                <font size="3"><u><b>SURAT KETERANGAN CATATAN KEPOLISIAN</b></u></font><br>
                <font size="3">NO SURAT : {{ $skck->nosurat }}</font>
            </td>
        </tr>
        <tr>
            <td colspan="3">Yang bertanda tangan di bawah ini, Kepala Desa Margamulya Kecamatan Cikajang Kabupaten Garut, menerangkan dengan sebenarnya bahwa :</td>
        </tr>
        <tr>
            <td width=32%>Nama</td>
            <td width=0%>:</td>
            <td style="text-transform:" width=68%>{{ $skck->user->nama }}</td>
        </tr>
        <tr>
            <td>No Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $skck->user->nik }}</td>
        </tr>
        <tr>
            <td>No Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $skck->user->no_kk }}</td>
        </tr>
        <tr>
            <td>Tempat, tanggal lahir</td>
            <td>:</td>
            <td>{{ $skck->user->ttl }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $skck->user->jk }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $skck->user->agama }}</td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>{{ $skck->user->pendidikan }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $skck->user->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $skck->user->status }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $skck->user->alamat }}</td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    Berdasarkan keterangan dari RT dan RW setempat benar bahwa yang bersangkutan Penduduk Desa Margamulya Kecamatan Arjasari Kabupaten Bandung dan yang bersangkutan :
                </p>
                <p style="text-align: center"><i><b>{{ $skck->klarifikasi }}</b></i></p>
               
                <p style="text-align: justify;">
                    Surat keterangan ini digunakan untuk: <i>{{ $skck->keterangan }}</i>
                </p>
                <p>Demikian Surat Keterangan ini, untuk dipergunakan sebagaimana mestinya</p>
            </td>
        </tr>
    </table>

    <br>

    {{-- TTD --}}
    <table border="0" align="center">
        <tr>
            <td style="text-align:center; position:relative;" width=35%>
                {{-- Mengetahui <br>
                Reg No : ................. <br>
                CAMAT ARJASARI<br><br><br><br>
                <u>.........................................</u> --}}
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
            <td style="text-align:center; position:relative" width=80%>
                Bandung, {{ $skck->updated_at->format('d F Y') }} <br>
                Kepala Desa Margamulya <br>
                <img src="{{ public_path('storage/ttdcap/'.$skck->ttd.'') }}" height="120" width="" align="right" style="position:absolute; top:10; right: 4 "> <br><br><br><br><br>
                <u style="text-align:center; line-height:0">{{ $skck->kades }}</u>
            </td>
        </tr>
        {{-- pembatas --}}
        <tr>
            <td colspan="6">
               &nbsp;
            </td>
            <td>
               Mengetahui
            </td>
            <td colspan="6">
               &nbsp;
            </td>
        </tr>
        {{-- ttd POLSEK --}}
         <tr>
            <td style="text-align:center; position:relative;" width=35%>
                Reg No : ................. <br>
                CAMAT ARJASARI<br><br><br><br><br>
                <u>.........................................</u>
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
                KAPOLSEK ARJASARI<br><br><br><br><br>
                <u>.........................................</u>
                <p style="text-align:left; line-height:0">NRP:</p>
            </td>
        </tr>
        
    </table>

</body>

</html>