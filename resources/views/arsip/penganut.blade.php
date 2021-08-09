<!DOCTYPE html>
<html>

<head>
    <title>Surat Pernyataan</title>
</head>

<body>
    <!-- KOP SURAT -->
    <table border="0" align="center" style="margin-top: 5px;" width=84%>
        <tr>
            <td colspan="2">
                <br>
                <center>
                    <font size="3"><b style="text-transform: uppercase;">SURAT PERNYATAAN PERUBAHAN KEPERCAYAAN TERHADAP TUHAN YANG MAHA ESA</b></font><br>
                    {{-- <font size="3">NO: {{ $ajuan->nosurat }}</font> --}}
                </center>
                <br>
            </td>
        </tr>
    </table>


    <table border="0" align="center" width=83% >
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
                    Menyatakan bahwa data agama saya telah berubah, yang semula agama {{ $ajuan->penganut->agama_sebelumnya }} menjadi kepercayaan Tuhan Yang Maha Esa ({{ $ajuan->penganut->organisasi }})
                </p>
                <p style="text-align: justify;">
                    dasar perubahan {{ $ajuan->penganut->dasar_perubahan }} No : {{ $ajuan->nosurat }} Tgl : {{ $ajuan->penganut->tanggal_perubahan }}
                </p>
                <p style="text-align: justify;">
                    Terlampir saya sampaikan copy Surat Pernyataan Tanggung Jawab Mutlak (SPTJM) yang terkait dengan perubahan tersebut.
                </p>
                <p style="text-align: justify;">
                    Demikian surat permohonan ini saya buat dengan sebenarnya, Apabila dalam keterangan yang saya berikan terdapat hal-hal yang tidak berdasarkan keadaan yang sebenarnya, saya bersedia dikenakan sanksi sesuai ketentuan perundang-undangan yang berlaku.
                </p>
            </td>
        </tr>
    </table>
    <br>
    {{-- TTD --}}
    <table border="0" align="center" width=83%>
        <tr>
            <td style="text-align: right; position:relative">
                Garut, {{ $ajuan->updated_at->format('d F Y') }} <br>
                Yang membuat pernyataan <br>
                <br><br><br><br><br>
                <u align="center">{{ $ajuan->user->nama }}</u>
            </td>
        </tr>
    </table>

</body>

</html>