<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan Tidak Mampu - {{ $sktm->user->nama }}</title>
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
                    <font size="3"><u><b>SURAT KETERANGAN TIDAK MAMPU</b></u></font><br>
                    {{-- <hr width="180" style="border-width: thin; margin-top: 0px;"> --}}
                    <font size="3">NO SURAT : {{ $sktm->nosurat }}</font>
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
            <td style="text-transform: uppercase;"><b>{{ $sktm->user->nama }}</b></td>
        </tr>
        <tr>
            <td>No Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $sktm->user->nik }}</td>
        </tr>
        <tr>
            <td>No Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $sktm->user->no_kk }}</td>
        </tr>
        <tr>
            <td>Tempat, tanggal lahir</td>
            <td>:</td>
            <td>{{ $sktm->user->ttl }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $sktm->user->jk }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $sktm->user->agama }}</td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>{{ $sktm->user->pendidikan }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $sktm->user->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $sktm->user->status }}</td>
        </tr>
        <tr>
            <td>Nama Orang Tua</td>
            <td>:</td>
            <td style="text-transform: uppercase;">{{ $sktm->user->ayah }} / {{ $sktm->user->ibu }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $sktm->user->alamat }}</td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                   Berdasarkan pengetahuan kami dan data yang ada benar bahwa yang bersangkutan Penduduk Desa Margamulya Kecamatan Arjasari Kabupaten Bandung. setelah melalui penelitian / pengamatan serta pengecekan langsung dari Tim Komisi yang terdiri dari Pekerja Sosial Masyarakat dan Saksi Pemberdayaan Masyarakat Kecamatan ARJASARI, bahwa nama tersebut diatas merupakan keluarga Pra Sejahtera/ Kurang Mampu/ Miskin yang memerlukan biaya
                </p>
                <p style="text-align: justify">
                    Berkenaan dengan hal tersebut, kami mohon dengan hormat kiranya Bapak /Ibu dapat memberikan keringanan.
                </p>
                <p style="text-align: justify;">
                   Demikian keterangan ini, untuk dipergunakan sebagaimana mestinya.
                </p>
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
                Margamulya, {{ $sktm->updated_at->format('d F Y') }} <br>
                Kepala Desa Margamulya <br>
                <img src="{{ public_path('storage/ttdcap/'.$sktm->ttd.'') }}" alt="" height="132" align="right" style="position:absolute; top:10; right: 4 "> <br><br><br><br>
                <p style="position:absolute; right:-80">{{ $sktm->kades }}</p>
            </td>
        </tr>
    </table>

</body>

</html>