<?php

namespace App\Http\Controllers\Admin;

use App\Sku;
use App\Skck;
use App\Sktb;
use App\Sktm;
use App\User;
use App\Ajuan;
use App\Kades;
use App\Puskesos;
use Barryvdh\DomPDF\PDF;
use App\Exports\SkuExport;
use App\Exports\SkckExport;
use App\Exports\SktbExport;
use App\Exports\SktmExport;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use App\Exports\PuskesosExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ArsipController extends Controller
{
    // LIHAT-DOWNLOAD 
    // // Surat Non-Harian
    public function sktbLihat($id)
    {
        $sktb = Sktb::find($id);
        $data['sktb'] = $sktb;
        $data['kades'] = Kades::where('status', 1)->first();

        $pdf = \PDF::loadView('arsip.sktb', $data);
        return $pdf->stream('Surat Keterangan Tanah Bangunan.pdf');
    }
    public function sktbDownload($id)
    {
        $sktb = Sktb::find($id);
        $data['sktb'] = $sktb;
        $data['kades'] = Kades::where('status', 1)->first();

        $pdf = \PDF::loadView('arsip.sktb', $data);
        return $pdf->download('Surat Keterangan Tanah Bangunan.pdf');
    }

    public function puskesosLihat($id)
    {
        $puskesos = Puskesos::find($id);
        $data['puskesos'] = $puskesos;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($puskesos->keterangan == 'Perbaikan Data Pada Kartu Indonesia Sehat') {
            $pdf = \PDF::loadView('arsip.puskesos-kis', $data);
            return $pdf->stream('Surat Keterangan PUSKESOS Kartu Indonesia Sehat.pdf');
        } else if ($puskesos->keterangan == 'Permohonan Perbaikan Status Pekerjaan Di Kartu Keluarga dan KTP') {
            $pdf = \PDF::loadView('arsip.puskesos-perbaikanstatus', $data);
            return $pdf->stream('Surat Keterangan PUSKESOS: Perbaikan Status.pdf');
        } else if ($puskesos->keterangan == 'Keluarga Miskin Tetapi Tidak terdaftar ke dalam BDT/DTKS di SIKS-NG') {
            $pdf = \PDF::loadView('arsip.puskesos-tidakterdaftar', $data);
            return $pdf->stream('Surat Keterangan PUSKESOS Tidak Terdaftar BDT.pdf');
        } else if ($puskesos->keterangan == 'Permohonan SKTM') {
            $pdf = \PDF::loadView('arsip.puskesos-miskin', $data);
            return $pdf->stream('Surat Keterangan PUSKESOS Pernyataan Miskin.pdf');
        } else {
            $pdf = \PDF::loadView('arsip.puskesos', $data);
            return $pdf->stream('Surat Keterangan PUSKESOS.pdf');
        }
    }
    public function puskesosDownload($id)
    {
        $puskesos = Puskesos::find($id);
        $data['puskesos'] = $puskesos;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($puskesos->keterangan == 'Perbaikan Data Pada Kartu Indonesia Sehat') {
            $pdf = \PDF::loadView('arsip.puskesos-kis', $data);
            return $pdf->download('Surat Keterangan PUSKESOS Kartu Indonesia Sehat.pdf');
        } else if ($puskesos->keterangan == 'Permohonan Perbaikan Status Pekerjaan Di Kartu Keluarga dan KTP') {
            $pdf = \PDF::loadView('arsip.puskesos-perbaikanstatus', $data);
            return $pdf->download('Surat Keterangan PUSKESOS: Perbaikan Status.pdf');
        } else if ($puskesos->keterangan == 'Keluarga Miskin Tetapi Tidak terdaftar ke dalam BDT/DTKS di SIKS-NG') {
            $pdf = \PDF::loadView('arsip.puskesos-tidakterdaftar', $data);
            return $pdf->download('Surat Keterangan PUSKESOS Tidak Terdaftar BDT.pdf');
        } else if ($puskesos->keterangan == 'Permohonan SKTM') {
            $pdf = \PDF::loadView('arsip.puskesos-miskin', $data);
            return $pdf->download('Surat Keterangan PUSKESOS Pernyataan Miskin.pdf');
        } else {
            $pdf = \PDF::loadView('arsip.puskesos', $data);
            return $pdf->download('Surat Keterangan PUSKESOS.pdf');
        }
    }

    public function sktmLihat($id)
    {
        $sktm = Sktm::find($id);
        $data['sktm'] = $sktm;
        $data['kades'] = Kades::where('status', 1)->first();

        $pdf = \PDF::loadView('arsip.sktm', $data);
        return $pdf->stream('Surat Keterangan Tidak Mampu.pdf');
    }
    public function sktmDownload($id)
    {
        $sktm = Sktm::find($id);
        $data['sktm'] = $sktm;
        $data['kades'] = Kades::where('status', 1)->first();

        $pdf = \PDF::loadView('arsip.sktm', $data);
        return $pdf->download('Surat Keterangan Tidak Mampu.pdf');
    }

    public function skuLihat($id)
    {
        $sku = Sku::find($id);
        $data['sku'] = $sku;
        $data['kades'] = Kades::where('status', 1)->first();

        $pdf = \PDF::loadView('arsip.sku', $data);
        return $pdf->stream('Surat Keterangan Usaha.pdf');
    }
    public function skuDownload($id)
    {
        $sku = Sku::find($id);
        $data['sku'] = $sku;
        $data['kades'] = Kades::where('status', 1)->first();

        $pdf = \PDF::loadView('arsip.sku', $data);
        return $pdf->download('Surat Keterangan Usaha.pdf');
    }
    public function skckLihat($id)
    {
        $skck = Skck::find($id);
        $data['skck'] = $skck;
        $data['kades'] = Kades::where('status', 1)->first();

        $pdf = \PDF::loadView('arsip.skck', $data);
        return $pdf->stream('Surat Keterangan Usaha.pdf');
    }
    public function skckDownload($id)
    {
        $skck = Skck::find($id);
        $data['skck'] = $skck;
        $data['kades'] = Kades::where('status', 1)->first();

        $pdf = \PDF::loadView('arsip.skck', $data);
        return $pdf->download('Surat Keterangan Usaha.pdf');
    }

    // // Surat Harian
    public function lihat($id)
    {
        $ajuan = Ajuan::find($id);

        $data['ajuan'] = $ajuan;
        $data['user'] = User::find($ajuan->user_id);
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->jenis == 'Surat Kehilangan') {
            $pdf = \PDF::loadView('arsip.kehilangan', $data);
            return $pdf->stream('Surat Keterangan Kehilangan.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Ahli Waris') {
            $pdf = \PDF::loadView('arsip.ahli-waris', $data);
            return $pdf->stream('Surat Keterangan Ahli Waris.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Penganut Kepercayaan Tuhan YME') {
            $pdf = \PDF::loadView('arsip.penganut', $data);
            return $pdf->stream('Surat Keterangan Penganut Kepercayaan Tuhan YME');
        } else if ($ajuan->jenis == 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME') {
            $pdf = \PDF::loadView('arsip.batal-menganut', $data);
            return $pdf->stream('Surat Keterangan Batal Menganut Kepercayaan Tuhan YME');
        } else if ($ajuan->jenis == 'Surat Keterangan Diluar Kota') {
            $pdf = \PDF::loadView('arsip.diluar-kota', $data);
            return $pdf->stream('Surat Keterangan Diluar Kota.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Kebakaran') {
            $pdf = \PDF::loadView('arsip.kebakaran', $data);
            return $pdf->stream('Surat Keterangan Kebakaran');
        } else if ($ajuan->jenis == 'Surat Domisili') {
            $pdf = \PDF::loadView('arsip.domisili', $data);
            return $pdf->stream('Surat Domisili');
        } else if ($ajuan->jenis == 'Surat Izin Keramaian') {
            $pdf = \PDF::loadView('arsip.izin-keramaian', $data);
            return $pdf->stream('Surat Izin Keramaian');
        } else if ($ajuan->jenis == 'Surat Keterangan Beda Nama') {
            $pdf = \PDF::loadView('arsip.beda-nama', $data);
            return $pdf->stream('Surat Keterangan Beda Nama');
        } else if ($ajuan->jenis == 'Surat Keterangan Tidak Masuk Kerja') {
            $pdf = \PDF::loadView('arsip.tidak-kerja', $data);
            return $pdf->stream('Surat Keterangan Tidak Masuk Kerja');
        } else if ($ajuan->jenis == 'Surat Keterangan Izin Orang Tua') {
            $pdf = \PDF::loadView('arsip.izin-ortu', $data);
            return $pdf->stream('Surat Keterangan Izin Orang Tua');
        } else if ($ajuan->jenis == 'Surat Kuasa') {
            $pdf = \PDF::loadView('arsip.kuasa', $data);
            return $pdf->stream('Surat Kuasa');
        } else if ($ajuan->jenis == 'Surat Keterangan Janda Duda') {
            $pdf = \PDF::loadView('arsip.janda-duda', $data);
            return $pdf->stream('Surat Keterangan Janda Duda');
        } else if ($ajuan->jenis == 'Surat Keterangan Belum Menikah') {
            $pdf = \PDF::loadView('arsip.belum-menikah', $data);
            return $pdf->stream('Surat Keterangan Belum Menikah');
        } else if ($ajuan->jenis == 'Surat Keterangan Serbaguna') {
            $pdf = \PDF::loadView('arsip.serbaguna', $data);
            return $pdf->stream('Surat Keterangan Serbaguna');
        } else if ($ajuan->jenis == 'Surat Penghasilan') {
            $pdf = \PDF::loadView('arsip.penghasilan', $data);
            return $pdf->stream('Surat Penghasilan.pdf');
        } else if ($ajuan->jenis == 'Surat KTP Expire') {
            $pdf = \PDF::loadView('arsip.ktp-expire', $data);
            return $pdf->stream('Surat KTP Expired.pdf');
        } else if ($ajuan->jenis == 'SKCK') {
            $pdf = \PDF::loadView('arsip.skck', $data);
            return $pdf->stream('SKCK.pdf');
        } else if ($ajuan->jenis == 'SKTM') {
            $pdf = \PDF::loadView('arsip.sktm', $data);
            return $pdf->stream('SKTM.pdf');
        }
    }

    public function download($id)
    {
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['user'] = User::find($ajuan->user_id);

        if ($ajuan->jenis == 'Surat Kehilangan') {
            $pdf = \PDF::loadView('arsip.kehilangan', $data);
            return $pdf->download('Surat Kehilangan.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Kebakaran') {
            $pdf = \PDF::loadView('arsip.kebakaran', $data);
            return $pdf->download('Surat Keterangan Kebakaran');
        } else if ($ajuan->jenis == 'Surat Keterangan Penganut Kepercayaan Tuhan YME') {
            $pdf = \PDF::loadView('arsip.penganut', $data);
            return $pdf->download('Surat Keterangan Penganut Kepercayaan Tuhan YME');
        } else if ($ajuan->jenis == 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME') {
            $pdf = \PDF::loadView('arsip.batal-menganut', $data);
            return $pdf->download('Surat Keterangan Batal Menganut Kepercayaan Tuhan YME');
        } else if ($ajuan->jenis == 'Surat Keterangan Diluar Kota') {
            $pdf = \PDF::loadView('arsip.diluar-kota', $data);
            return $pdf->download('Surat Keterangan Diluar Kota.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Ahli Waris') {
            $pdf = \PDF::loadView('arsip.ahli-waris', $data);
            return $pdf->download('Surat Keterangan Ahli Waris');
        } else if ($ajuan->jenis == 'Surat Domisili') {
            $pdf = \PDF::loadView('arsip.domisili', $data);
            return $pdf->download('Surat Domisili');
        } else if ($ajuan->jenis == 'Surat Izin Keramaian') {
            $pdf = \PDF::loadView('arsip.izin-keramaian', $data);
            return $pdf->download('Surat Izin Keramaian');
        } else if ($ajuan->jenis == 'Surat Keterangan Beda Nama') {
            $pdf = \PDF::loadView('arsip.beda-nama', $data);
            return $pdf->download('Surat Keterangan Beda Nama');
        } else if ($ajuan->jenis == 'Surat Keterangan Tidak Masuk Kerja') {
            $pdf = \PDF::loadView('arsip.tidak-kerja', $data);
            return $pdf->download('Surat Keterangan Tidak Masuk Kerja');
        } else if ($ajuan->jenis == 'Surat Keterangan Izin Orang Tua') {
            $pdf = \PDF::loadView('arsip.izin-ortu', $data);
            return $pdf->download('Surat Keterangan Izin Orang Tua');
        } else if ($ajuan->jenis == 'Surat Kuasa') {
            $pdf = \PDF::loadView('arsip.kuasa', $data);
            return $pdf->download('Surat Kuasa');
        } else if ($ajuan->jenis == 'Surat Keterangan Janda Duda') {
            $pdf = \PDF::loadView('arsip.janda-duda', $data);
            return $pdf->download('Surat Keterangan Janda Duda');
        } else if ($ajuan->jenis == 'Surat Keterangan Belum Menikah') {
            $pdf = \PDF::loadView('arsip.belum-menikah', $data);
            return $pdf->download('Surat Keterangan Belum Menikah');
        } else if ($ajuan->jenis == 'Surat Keterangan Serbaguna') {
            $pdf = \PDF::loadView('arsip.serbaguna', $data);
            return $pdf->download('Surat Keterangan Serbaguna');
        } else if ($ajuan->jenis == 'Surat Penghasilan') {
            $pdf = \PDF::loadView('arsip.penghasilan', $data);
            return $pdf->download('Surat Keterangan Penghasilan.pdf');
        } else if ($ajuan->jenis == 'Surat KTP Expire') {
            $pdf = \PDF::loadView('arsip.ktp-expire', $data);
            return $pdf->download('Surat KTP Expired.pdf');
        } else if ($ajuan->jenis == 'SKCK') {
            $pdf = \PDF::loadView('arsip.skck', $data);
            return $pdf->download('SKCK.pdf');
        } else if ($ajuan->jenis == 'SKTM') {
            $pdf = \PDF::loadView('arsip.sktm', $data);
            return $pdf->download('SKTM.pdf');
        }
    }

    // INDEX
    public function index()
    {
        $arsip = Ajuan::where('acc', 1)->latest()->paginate(10);
        return view('admin.arsip.index', compact('arsip'));
    }

    public function sktb()
    {
        $sktbs = Sktb::where('acc', 1)->latest()->paginate(10);
        return view('admin.arsip.non-harian.sktb', compact('sktbs'));
    }

    public function sku()
    {
        $skus = Sku::where('acc', 1)->latest()->get();
        return view('admin.arsip.non-harian.sku', compact('skus'));
    }

    public function sktm()
    {
        $sktms = Sktm::where('acc', 1)->latest()->get();
        return view('admin.arsip.non-harian.sktm', compact('sktms'));
    }

    public function skck()
    {
        $skcks = Skck::where('acc', 1)->latest()->get();
        return view('admin.arsip.non-harian.skck', compact('skcks'));
    }

    public function puskesos()
    {
        $puskesoss = Puskesos::where('acc', 1)->latest()->get();
        return view('admin.arsip.non-harian.puskesos', compact('puskesoss'));
    }



    // LAPORAN
    public function laporan()
    {
        return Excel::download(new LaporanExport, 'surat-keluar.xlsx');
    }

    public function sktbLaporan()
    {
        return Excel::download(new SktbExport, 'sktb-keluar.xlsx');
    }

    public function skuLaporan()
    {
        return Excel::download(new SkuExport, 'sku-keluar.xlsx');
    }

    public function sktmLaporan()
    {
        return Excel::download(new SktmExport, 'sktm-keluar.xlsx');
    }

    public function skckLaporan()
    {
        return Excel::download(new SkckExport, 'skck-keluar.xlsx');
    }

    public function puskesosLaporan()
    {
        return Excel::download(new PuskesosExport, 'puskesos-keluar.xlsx');
    }
}
