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
    </table>

    <table border="0" align="center" width=83%>
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <td><u>.............................</u></td>
            <td style="text-align: right;">Margamulya, {{ $puskesos->updated_at->format('d F Y') }}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>-</td>
            <td style="text-align: right;">&nbsp;</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td>Permohonan Perbaikan Data <b>KIS</b></td> 
            <td style="text-align: right;">&nbsp;</td>
        </tr>
    </table>
    
    <br>


    <table border="0" align="center" width=83% >
        <tr>
            <td>
                Kepada Yth.<br>
                Pimpinan BPJS Kesehatan Kab. Garut<br>
                Di<br>
                Soreang
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <tr>
            <td>
                <p style="text-align: justify;">
                    <b>Assalamu'alaikum Wr, Wb.</b> <br>
                    Dengan Hormat, 
                </p>
                <p style="text-align: justify;">
                    Sehubungan dengan masih banyaknya ketidaksesuayan  data yang terdapat dalam <b>Kartu Indonesia Sehat (KIS)</b> dengan Data Kartu Penduduk (KTP) Baik Nama, Nik dan Alamat. Oleh karna hal tersebut di atas. Maka dengan ini Kepala Desa Margamulya kecamatan Cikajang Kab. Garut mengajukan permohonan Perbaikan Data, yang di selenggarakan di kantor Desa Margamulya Adapun waktunya kami serahkan kepada Pihak BPJS.
                </p>
                <p style="text-align: justify;">
                   Demikian hal ini disampaikan, atas perhatian dan perkenan Bapak/Ibu Kami haturkan Terima Kasih.
                </p>
                <p style="text-align: justify;">
                   <b>Wasallamualaikum, Wr, Wb.</b>
                </p>
            </td>
        </tr>
    </table>

    <br>

    {{-- TTD --}}
    <table border="0" align="center" width=83%>
        <tr>
            <td style="text-align: right; position:relative">
                Margamulya, {{ $puskesos->updated_at->format('d F Y') }} <br>
                Kepala Desa Margamulya <br>
                <img src="{{ public_path('storage/ttdcap/'.$puskesos->ttd.'') }}" alt="" height="155" align="right" style="position:absolute; top:10; right: 4 "> <br><br><br><br><br>
                <p style="position:absolute; right:-90">{{ $puskesos->kades }}</p>
            </td>
        </tr>
    </table>
    <table border="0" align="center" width=83%>
        <tr style="line-height:0.3">
            <td>
                Tembusan Kepada Yth. :
            </td>
        </tr>
        <tr>
            <td>
                <ol>
                    <li>Bapak Bupati Garut</li>
                    <li>Bapak Camat Cikajang</li>
                    <li>BPD DS Margamulya</li>
                    <li>Arsip</li>
                </ol>
            </td>
        </tr>
    </table>

</body>

</html>