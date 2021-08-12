<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan Tanah Bangunan - {{ $sktb->user->nama }}</title>
</head>

<body>
    <!-- KOP SURAT -->
    <table border="0" align="center" style="margin-top: 10px;" width=84%>
        <tr>
            <td width=14%><img src="{{ asset('images/logo.png') }}" alt="" width="85" height="85">
            </td>
            <td>
                <center>
                    <font size="3">PEMERINTAH KABUPATEN GARUT</font> <br>
                    <font size="3">KECAMATAN CIKAJANG</font> <br>
                    <font size="5"><b>DESA MARGAMULYA</b></font> <br>
                    <font size="3"><i>Jl. Raya Simpang Cikandang No.846, Margamulya, Cikajang, Kabupaten Garut, Jawa Barat 44171</i></font>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="border: 2px; border-top:5px double">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
                <center>
                    <font size="3"><u><b>SURAT KETERANGAN TANAH BANGUNAN</b></u></font><br>
                    {{-- <hr width="180" style="border-width: thin; margin-top: 0px;"> --}}
                    <font size="3">NO SURAT : {{ $sktb->nosurat }}</font>
                </center>
                <br>
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    Yang bertanda tangan di bawah ini, Kepala Desa Margamulya Kecamatan Cikajang Kabupaten Garut, menerangkan dengan sebenarnya bahwa :
                </p>
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83% >
        <!-- IDENTITAS PENGAJU -->
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td style="text-transform: uppercase;"><b>{{ $sktb->user->nama }}</b></td>
        </tr>
        <tr>
            <td>No Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $sktb->user->nik }}</td>
        </tr>
        <tr>
            <td>No Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $sktb->user->no_kk }}</td>
        </tr>
        <tr>
            <td>Tempat, tanggal lahir</td>
            <td>:</td>
            <td>{{ $sktb->user->ttl }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $sktb->user->jk }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $sktb->user->agama }}</td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>{{ $sktb->user->pendidikan }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $sktb->user->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $sktb->user->status }}</td>
        </tr>
        <tr>
            <td>Nama Orang Tua</td>
            <td>:</td>
            <td style="text-transform: uppercase;">{{ $sktb->user->ayah }} / {{ $sktb->user->ibu }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $sktb->user->alamat }}</td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    Berdasarkan keterangan dari RT dan RW setempat benar bahwa yang bersangkutan Penduduk Desa Margamulya Kecamatan Cikajang Kabupaten Garut dan yang bersangkutan :
                </p>
                <p style="text-align: center">
                    Benar memiliki {{ $sktb->memiliki }} di lokasi arjasari dengan luas <b>{{ $sktb->luas }}</b> atas nama sertifikat <b>{{ $sktb->pemilik }}</b> dengan harga kisaran <b>Rp. {{ $sktb->harga }}</b>
                </p>
                <p style="text-align: justify;">
                    Surat keterangan ini digunakan untuk:
                </p>
                <p style="text-align: center"><i>{{ $sktb->keterangan }}</i></p>
                <p>Demikian Surat Keterangan ini, untuk dipergunakan sebagaimana mestinya</p>
            </td>
        </tr>
       
        {{-- <tr>
            <td>
                Demikian surat keterangan ini, untuk dipergunakan sebagaimana mestinya
            </td>
        </tr> --}}
    </table>

    <br><br>

    {{-- TTD --}}
    <table border="0" align="center" width=83%>
        <tr>
            <td style="text-align: right; position:relative">
            <div style="position: relative; left: -30px;">Margamulya, {{ $sktb->updated_at->format('d F Y') }} <br>
                Kepala Desa Margamulya</div>
            <img src="{{ asset('ttdcap/'.$sktb->ttd).''}}" alt="" height="280" align="right" style="position:absolute; top:-30"> <br><br><br><br>
            <p style="position:absolute; right:-170 !important;top:120">{{ $sktb->kades }}</p>
            </td>
        </tr>
    </table>

</body>

</html>