<!DOCTYPE html>
<html>

<head>
    <title>Surat Pernyataan Pengantar Izin Rame-Rame</title>
</head>

<body>
    <!-- KOP SURAT -->
    <table border="0" align="center" style="margin-top:5px;" width=95%>
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

    <table border="0" align="center" width=95% >
        <!-- IDENTITAS PENGAJU -->
        <tr>
            <td align="center" colspan="3">
                <font size="3"><u><b>SURAT PENGANTAR IZIN RAME-RAME</b></u></font><br>
                <font size="3">NO SURAT : {{ $ajuan->nosurat }}</font>
            </td>
        </tr>
        <tr>
            <td colspan="3">Yang bertanda tangan di bawah ini, Kepala Desa Margamulya Kecamatan Cikajang Kabupaten Garut, menerangkan dengan sebenarnya bahwa :</td>
        </tr>
        <tr>
            <td width=32%>Nama</td>
            <td width=0%>:</td>
            <td style="text-transform:" width=68%>{{ $ajuan->user->nama }}</td>
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
                <ol>
                    <li style="text-align: justify;">
                        Harus disertai ketentraman dan ketertiban dengan tetangga, menghargai waktu ibadah dalam menciptakan kerukunan umat beragama, maupun menjaga kebersihan lingkungan.
                    </li>
                    <li style="text-align: justify;">
                        Pada waktu pelaksanaan rame-rame dilarang melakukan hal-hal yang bertentangandengan ketentuan yang berlaku dan adat istiadat setempat.
                    </li>
                </ol>
            </td>
        </tr>
        <tr style="text-align: justify;">
            <td colspan="3">
                Demikian surat keterangan ini, untuk dipergunakan sebagaimana mestinya
            </td>
        </tr>
    </table>


    {{-- TTD --}}
    <table border="0" align="center">
        <tr>
            <td style="text-align:center; position:relative;" width=35%>
                Mengetahui <br>
                Reg No : ................. <br>
                CAMAT ARJASARI<br><br><br><br>
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
            <td style="text-align:center; position:relative" width=80%>
                Bandung, {{ $ajuan->updated_at->format('d F Y') }} <br>
                Kepala Desa Margamulya <br>
                <img src="{{ public_path('storage/ttdcap/'.$ajuan->ttd.'') }}" height="120" width="" align="right" style="position:absolute; top:10; right: 4 "> <br><br><br><br><br>
                <u style="text-align:center; line-height:0">{{ $ajuan->kades }}</u>
            </td>
        </tr>
        {{-- pembatas --}}
        <tr>
            <td colspan="12">
               &nbsp;
            </td>
            
            <td style="text-align:left; line-height:0.1" width=80%>
                <p>Pertimbangan Kapolsek ARJASARI</p>
                <p>NO: ................</p>
                <p>Atas Permohonannya</p>
                <p>Tidak/Diizinkan dengan catatan:</p>
                <p>................................</p>
            </td>
        </tr>
        {{-- ttd POLSEK --}}
         <tr>
            <td style="text-align:center; position:relative;" width=35%>
                DANRAMIL ARJASARI<br><br><br><br>
                <u>.........................................</u>
                <p style="text-align:left; line-height:0">NRP:</p>

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
                KAPOLSEK ARJASARI<br><br><br><br>
                <u>.........................................</u>
                <p style="text-align:left; line-height:0">NRP:</p>
            </td>
        </tr>
        
    </table>

</body>

</html>