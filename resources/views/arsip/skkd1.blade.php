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
                <center>
                    <font size="3"><u><b>SURAT KETERANGAN KEPALA DESA</b></u></font><br>
                    {{-- <hr width="180" style="border-width: thin; margin-top: 0px;"> --}}
                    <font size="3">NO SURAT : {{ $sktb->nosurat }}</font>
                </center>
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
            <td width=30%>Nama Pemilik</td>
            <td width=2%>:</td>
            <td style="text-transform: uppercase;"><b>{{ $sktb->pemilik}}</b></td>
        </tr>
        <tr>
            <td>Akta</td>
            <td>:</td>
            <td>{{ $sktb->akta }}</td>
        </tr>
        <tr>
            <td>No Akta</td>
            <td>:</td>
            <td>{{ $sktb->no_akta }}</td>
        </tr>
        <tr>
            <td>Blok</td>
            <td>:</td>
            <td>{{ $sktb->blok }}</td>
        </tr>
        <tr>
            <td>No Persil</td>
            <td>:</td>
            <td>{{ $sktb->no_personil }}</td>
        </tr>
        <tr>
            <td>No Kohir</td>
            <td>:</td>
            <td>{{ $sktb->no_kohir }}</td>
        </tr>
        <tr>
            <td>Luas Tanah</td>
            <td>:</td>
            <td>{{ $sktb->luas_persegi }}</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">Bahwa Tanah tersebut betul-betul milik dari saudara/i <b style="text-transform: uppercase;">{{ $sktb->pemilik }}</b> tidak dalam sengketa baik batas-batas maupun kepemilikannya dan dengan batas-batas sebagai berikut :</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>Utara</td>
            <td>:</td>
            <td>{{ $sktb->utara }}</td>
        </tr>
        <tr>
            <td>Barat</td>
            <td>:</td>
            <td>{{ $sktb->barat }}</td>
        </tr>
        <tr>
            <td>Selatan</td>
            <td>:</td>
            <td>{{ $sktb->selatan }}</td>
        </tr>
        <tr>
            <td>Timur</td>
            <td>:</td>
            <td>{{ $sktb->timur }}</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">Tanah tersebut ditaksir dengan harga taksiran <b style="text-transform: uppercase;">Rp. {{ $sktb->harga }}/M<sup>2</sup></b> <i>({{ $sktb->harga_terbilang }})</i></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</td>
        </tr>
    </table>

    <br>
    {{-- TTD --}}
    <table border="0" align="center">
        <tr>
            <td style="text-align:justify; line-height:0.3" width=38%>
                {{-- Mengetahui <br>
                Reg No : ................. <br>
                CAMAT ARJASARI<br><br><br><br>
                <u>.........................................</u> --}}
                <b>Harga Taksiran</b>
                <p>Tanah : Rp. {{ $sktb->total_harga_tanah }}</p>
                <p>Bangunan : Rp. {{ $sktb->nominal_bangunan }}</p>
                <hr style="border: 1px; margin-bottom:11;">
                <b>Total : Rp. {{ $sktb->total_harga }}</b>
                {{-- <ol>
                    <li>Tanah : Rp. {{ $sktb->total_harga_tanah }}</li>
                    <li>Bangunan : Rp. {{ $sktb->nominal_bangunan }}</li>
                </ol> --}}
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
            <div style="position: relative; left: -30px;">Garut, {{ $sktb->updated_at->format('d F Y') }} <br>
                Kepala Desa Margamulya</div>
            <img src="{{ asset('ttdcap/'.$sktb->ttd).''}}" alt="" height="280" align="right" style="position:absolute; top:-30"> <br><br><br><br>
            <p style="position:absolute; right:-170 !important;top:120">{{ $sktb->kades }}</p>
            </td>
        </tr>
    </table>

</body>

</html>