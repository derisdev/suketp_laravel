<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan Usaha - {{ $sku->user->nama }}</title>
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
        <tr>
            <td colspan="2">
                <br>
                <center>
                    <font size="3"><u><b>SURAT KETERANGAN USAHA</b></u></font><br>
                    {{-- <hr width="180" style="border-width: thin; margin-top: 0px;"> --}}
                    <font size="3">NO SURAT : {{ $sku->nosurat }}</font>
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
            <td style="text-transform: uppercase;">{{ $sku->user->nama }}</td>
        </tr>
        <tr>
            <td>No Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $sku->user->nik }}</td>
        </tr>
        <tr>
            <td>No Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $sku->user->no_kk }}</td>
        </tr>
        <tr>
            <td>Tempat, tanggal lahir</td>
            <td>:</td>
            <td>{{ $sku->user->ttl }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $sku->user->jk }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $sku->user->agama }}</td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>{{ $sku->user->pendidikan }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $sku->user->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $sku->user->status }}</td>
        </tr>
        <tr>
            <td>Nama Orang Tua</td>
            <td>:</td>
            <td style="text-transform: uppercase;">{{ $sku->user->ayah }} / {{ $sku->user->ibu }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $sku->user->alamat }}</td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    Berdasarkan pengetahuan kami dan data yang ada benar bahwa yang bersangkutan Penduduk Desa Margamulya Kecamatan Arjasari Kabupaten Bandung dan pada saat ini memiliki usaha :
                </p>
                <p style="text-align: center">
                    <b>{{ $sku->nama_usaha }} yang berlokasi di {{ $sku->alamat_usaha }}</b>
                </p>
                <p style="text-align: justify;">
                    Surat keterangan ini digunakan untuk:
                </p>
                <p style="text-align: center"><i>{{ $sku->keterangan }}</i></p>
                <p>Demikian surat Penghasilan ini, untuk dipergunakan sebagaimana mestinya</p>
            </td>
        </tr>
    </table>

    <br><br>

    {{-- TTD --}}
    <table border="0" align="center" width=83%>
        <tr>
            <td style="text-align: right; position:relative">
                Margamulya, {{ $sku->updated_at->format('d F Y') }} <br>
                Kepala Desa Margamulya <br>
                <img src="{{ public_path('storage/ttdcap/'.$sku->ttd.'') }}" alt="" height="132" align="right" style="position:absolute; top:10; right: 4 "> <br><br><br><br>
                <p style="position:absolute; right:-80">{{ $sku->kades }}</p>
            </td>
        </tr>
    </table>

</body>

</html>