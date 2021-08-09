<!DOCTYPE html>
<html>

<head>
    <title>SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK BAGI PENGHAKAYAT KEPERCAYAAN TUHAN YANG MAHA ESA</title>
</head>

<body>
    <!-- KOP SURAT -->
    <table border="0" align="center" style="margin-top: 5px;" width=84%>
        <tr>
            <td colspan="2">
                <br>
                <center>
                    <font size="3"><b style="text-transform: uppercase;">SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK BAGI PENGHAKAYAT KEPERCAYAAN TUHAN YANG MAHA ESA</b></font><br>
                </center>
                <br>
            </td>
        </tr>
    </table>
    <br>

    <table border="0" align="center" width=83% >
        <!-- PIHAK KESATU -->
        <tr>
            <td>Yang bertanda tangan di bawah ini:</td>
        </tr>
        <tr>
            <td width=40%>Nama Lengkap</td>
            <td width=2%>:</td>
            <td style="text-transform: uppercase;">{{ $ajuan->user->nama }}</td>
        </tr>
        <tr>
            <td>Nomor Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $ajuan->user->nik }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $ajuan->user->alamat }}</td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    Menyatakan bahwa data agama saya telah berubah, yang semula agama {{ $ajuan->penganut->agama_sebelumnya }} menjadi kepercayaan Tuhan Yang Maha Esa {{ $ajuan->penganut->organisasi }}
                </p>
                <p style="text-align: justify;">
                    Demikian surat permohonan ini saya buat dengan sebenarnya, Apabila dalam keterangan yang saya berikan terdapat hal-hal yang tidak berdasarkan keadaan yang sebenarnya, saya bersedia dikenakan sanksi sesuai ketentuan perundang-undangan yang berlaku.
                </p>
            </td>
        </tr>
    </table>

    <br>

    {{-- TTD --}}
    <table border="0" align="center">
        <tr>
            <td style="text-align:center; position:relative;" width=35%>
                Saksi I<br><br><br><br><br><br><br>
                <u>{{ $ajuan->penganut->saksi_1 }}</u>
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
                Garut, {{ $ajuan->updated_at->format('d F Y') }}<br>
                Yang membuat pernyataan,<br><br><br><br><br><br>
                <u>{{ $ajuan->user->nama }}</u>
            </td>
        </tr>
        <tr>
            <td colspan="13">
               &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="13">
               &nbsp;
            </td>
        </tr>
        <tr>
            <td style="text-align:center; position:relative;" width=35%>
                Saksi II<br><br><br><br><br><br>
                <u>{{ $ajuan->penganut->saksi_2 }}</u>
            </td>
            
            <td colspan="12">
               &nbsp;
            </td>
            
        </tr>
    </table>

</body>

</html>