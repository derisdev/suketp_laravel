<?php

namespace App\Http\Controllers\Api;

use App\Sku;
use App\Skck;
use App\Sktb;
use App\Sktm;
use App\User;
use App\Ajuan;
use App\Kades;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Puskesos;

class DownloadController extends Controller
{
    // PUSKESOS
    public function puskesosLihat($id)
    {
        $user_id = auth('api')->user()->id;
        $puskesos = Puskesos::find($id);
        $data['puskesos'] = $puskesos;
        if ($puskesos->acc == 1) {
            if ($puskesos->user_id == $user_id) {
                if ($puskesos->keterangan == 'Perbaikan Data Pada Kartu Indonesia Sehat') {
                    $pdf = \PDF::loadView('arsip.puskesos-kis', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS Kartu Indonesia Sehat']);
                } else if ($puskesos->keterangan == 'Permohonan Perbaikan Status Pekerjaan Di Kartu Keluarga dan KTP') {
                    $pdf = \PDF::loadView('arsip.puskesos-perbaikanstatus', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS: Perbaikan Status']);
                } else if ($puskesos->keterangan == 'Keluarga Miskin Tetapi Tidak terdaftar ke dalam BDT/DTKS di SIKS-NG') {
                    $pdf = \PDF::loadView('arsip.puskesos-tidakterdaftar', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS Tidak Terdaftar BDT']);
                } else if ($puskesos->keterangan == 'Permohonan SKTM') {
                    $pdf = \PDF::loadView('arsip.puskesos-miskin', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS Pernyataan Miskin']);
                } else {
                    $pdf = \PDF::loadView('arsip.puskesos', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS']);
                }
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function puskesosDownload($id)
    {
        $user_id = auth('api')->user()->id;
        $puskesos = Puskesos::find($id);
        $data['puskesos'] = $puskesos;
        if ($puskesos->acc == 1) {
            if ($puskesos->user_id == $user_id) {
                if ($puskesos->keterangan == 'Perbaikan Data Pada Kartu Indonesia Sehat') {
                    $pdf = \PDF::loadView('arsip.puskesos-kis', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS Kartu Indonesia Sehat.pdf']);
                } else if ($puskesos->keterangan == 'Permohonan Perbaikan Status Pekerjaan Di Kartu Keluarga dan KTP') {
                    $pdf = \PDF::loadView('arsip.puskesos-perbaikanstatus', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS: Perbaikan Status.pdf']);
                } else if ($puskesos->keterangan == 'Keluarga Miskin Tetapi Tidak terdaftar ke dalam BDT/DTKS di SIKS-NG') {
                    $pdf = \PDF::loadView('arsip.puskesos-tidakterdaftar', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS Tidak Terdaftar BDT.pdf']);
                } else if ($puskesos->keterangan == 'Permohonan SKTM') {
                    $pdf = \PDF::loadView('arsip.puskesos-miskin', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS Pernyataan Miskin.pdf']);
                } else {
                    $pdf = \PDF::loadView('arsip.puskesos', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan PUSKESOS.pdf']);
                }
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    // SKTB
    public function sktbLihat($id)
    {
        $user_id = auth('api')->user()->id;
        $sktb = Sktb::find($id);
        $data['sktb'] = $sktb;
        if ($sktb->acc == 1) {
            if ($sktb->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.sktb', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Tanah Bangunan']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function sktbDownload($id)
    {
        $user_id = auth('api')->user()->id;
        $sktb = Sktb::find($id);
        $data['sktb'] = $sktb;
        if ($sktb->acc == 1) {
            if ($sktb->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.sktb', $data);
               return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Tanah Bangunan.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function skkdLihat($id)
    {
        $user_id = auth('api')->user()->id;
        $sktb = Sktb::find($id);
        $data['sktb'] = $sktb;
        if ($sktb->acc == 1) {
            if ($sktb->user_id == $user_id) {
                if ($sktb->jenis == 'Surat Keterangan Tanah Bangunan') {
                    $pdf = \PDF::loadView('arsip.skkd1', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Kepala Desa']);
                }
                if ($sktb->jenis == 'Surat Keterangan Tanah Bangunan 2') {
                    $pdf = \PDF::loadView('arsip.skkd2', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Kepala Desa']);
                }
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function skkdDownload($id)
    {
        $user_id = auth('api')->user()->id;
        $sktb = Sktb::find($id);
        $data['sktb'] = $sktb;
        if ($sktb->acc == 1) {
            if ($sktb->user_id == $user_id) {
                if ($sktb->jenis == 'Surat Keterangan Tanah Bangunan') {
                    $pdf = \PDF::loadView('arsip.skkd1', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Kepala Desa']);
                }
                if ($sktb->jenis == 'Surat Keterangan Tanah Bangunan 2') {
                    $pdf = \PDF::loadView('arsip.skkd2', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Kepala Desa']);
                }
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    // SKU
    public function skuLihat($id)
    {
        $user_id = auth('api')->user()->id;
        $sku = Sku::find($id);
        $data['sku'] = $sku;
        if ($sku->acc == 1) {
            if ($sku->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.sku', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Usaha']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function skuDownload($id)
    {
        $user_id = auth('api')->user()->id;
        $sku = Sku::find($id);
        $data['sku'] = $sku;
        if ($sku->acc == 1) {
            if ($sku->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.sku', $data);
               return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Usaha.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    // SKU
    public function sktmLihat($id)
    {
        $user_id = auth('api')->user()->id;
        $sktm = Sktm::find($id);
        $data['sktm'] = $sktm;
        if ($sktm->acc == 1) {
            if ($sktm->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.sktm', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKTM Pemohon']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function sktmDownload($id)
    {
        $user_id = auth('api')->user()->id;
        $sktm = Sktm::find($id);
        $data['sktm'] = $sktm;
        if ($sktm->acc == 1) {
            if ($sktm->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.sktm', $data);
               return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKTM Pemohon.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function sktmAnak($id)
    {
        $user_id = auth('api')->user()->id;
        $sktm = Sktm::find($id);
        $data['sktm'] = $sktm;
        if ($sktm->acc == 1) {
            if ($sktm->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.sktm-anak', $data);
               return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKTM Anak.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function lihatSktmAnak($id)
    {
        $user_id = auth('api')->user()->id;
        $sktm = Sktm::find($id);
        $data['sktm'] = $sktm;
        if ($sktm->acc == 1) {
            if ($sktm->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.sktm-anak', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKTM Anak']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    // SKCK
    public function skckLihat($id)
    {
        $user_id = auth('api')->user()->id;
        $skck = Skck::find($id);
        $data['skck'] = $skck;
        if ($skck->acc == 1) {
            if ($skck->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.skck', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKCK']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function skckDownload($id)
    {
        $user_id = auth('api')->user()->id;
        $skck = Skck::find($id);
        $data['skck'] = $skck;
        if ($skck->acc == 1) {
            if ($skck->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.skck', $data);
               return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Mampu.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function skckSemi($id)
    {
        $user_id = auth('api')->user()->id;
        $skck = Skck::find($id);
        $data['skck'] = $skck;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($skck->acc == 1) {
            if ($skck->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.skck-semi', $data);
               return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKCK Semi.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function skckLengkap($id)
    {
        $user_id = auth('api')->user()->id;
        $skck = Skck::find($id);
        $data['skck'] = $skck;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($skck->acc == 1) {
            if ($skck->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.skck-lengkap', $data);
               return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKCK Lengkap.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function lihatSkckSemi($id)
    {
        $user_id = auth('api')->user()->id;
        $skck = Skck::find($id);
        $data['skck'] = $skck;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($skck->acc == 1) {
            if ($skck->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.skck-semi', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKCK Semi']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function lihatSkckLengkap($id)
    {
        $user_id = auth('api')->user()->id;
        $skck = Skck::find($id);
        $data['skck'] = $skck;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($skck->acc == 1) {
            if ($skck->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.skck-lengkap', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKCK Lengkap']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    // DOWNLOAD SURAT PERNYATAAN

    public function keramaianPernyataan($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.keramaian-pernyataan', $data);
               return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Pernyataan Keramaian.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    public function lihatKeramaianPernyataan($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.keramaian-pernyataan', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Pernyataan Keramaian']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    public function domisiliPernyataan($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.domisili-pernyataan', $data);
               return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Pernyataan Domisili.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function lihatDomisiliPernyataan($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.domisili-pernyataan', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Pernyataan Domisili']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    public function penganutKk($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.penganut-kk', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Permohonan Cetak KK Bagi Penganut.pdf']);
                
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function lihatPenganutKk($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.penganut-kk', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Permohonan Cetak KK Bagi Penganut']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    public function penganutTanggung($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.penganut-tanggung', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Pernyataan Tanggung Jawab.pdf']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
    public function lihatPenganutTanggung($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                $pdf = \PDF::loadView('arsip.penganut-tanggung', $data);
                return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Pernyataan Tanggung Jawab']);
            }
            else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        }
        else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }


    // SURAT HARIAN
    public function lihat($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['ajuan'] = $ajuan;
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                if ($ajuan->jenis == 'Surat Domisili') {
                    $pdf = \PDF::loadView('arsip.domisili', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Domisili']);
                    
                } else if ($ajuan->jenis == 'Surat Keterangan Kebakaran') {
                    $pdf = \PDF::loadView('arsip.kebakaran', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Kebakaran']);
                } else if ($ajuan->jenis == 'Surat Keterangan Penganut Kepercayaan Tuhan YME') {
                    $pdf = \PDF::loadView('arsip.penganut', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Penganut Kepercayaan Tuhan YME']);
                } else if ($ajuan->jenis == 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME') {
                    $pdf = \PDF::loadView('arsip.batal-menganut', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME']);
                } else if ($ajuan->jenis == 'Surat Keterangan Diluar Kota') {
                    $pdf = \PDF::loadView('arsip.diluar-kota', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Diluar Kota']);
                } else if ($ajuan->jenis == 'Surat Keterangan Ahli Waris') {
                    $pdf = \PDF::loadView('arsip.ahli-waris', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Ahli Waris']);
                } else if ($ajuan->jenis == 'Surat Izin Keramaian') {
                    $pdf = \PDF::loadView('arsip.izin-keramaian', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Izin Keramaian']);
                } else if ($ajuan->jenis == 'Surat Keterangan Beda Nama') {
                    $pdf = \PDF::loadView('arsip.beda-nama', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Beda Nama']);
                } else if ($ajuan->jenis == 'Surat Keterangan Tidak Masuk Kerja') {
                    $pdf = \PDF::loadView('arsip.tidak-kerja', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Tidak Masuk Kerja']);
                } else if ($ajuan->jenis == 'Surat Keterangan Izin Orang Tua') {
                    $pdf = \PDF::loadView('arsip.izin-ortu', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Izin Orang Tua']);
                } else if ($ajuan->jenis == 'Surat Kuasa') {
                    $pdf = \PDF::loadView('arsip.kuasa', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Kuasa']);
                } else if ($ajuan->jenis == 'Surat Keterangan Janda Duda') {
                    $pdf = \PDF::loadView('arsip.janda-duda', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Janda Duda']);
                } else if ($ajuan->jenis == 'Surat Keterangan Belum Menikah') {
                    $pdf = \PDF::loadView('arsip.belum-menikah', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Belum Menikah']);
                } else if ($ajuan->jenis == 'Surat Keterangan Serbaguna') {
                    $pdf = \PDF::loadView('arsip.serbaguna', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Serbaguna']);
                } else if ($ajuan->jenis == 'Surat KTP Expire') {
                    $pdf = \PDF::loadView('arsip.ktp-expire', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat KTP Expire']);
                } else if ($ajuan->jenis == 'Surat Penghasilan') {
                    $pdf = \PDF::loadView('arsip.penghasilan', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Penghasilan']);
                } else if ($ajuan->jenis == 'Surat Kehilangan') {
                    $pdf = \PDF::loadView('arsip.kehilangan', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Kehilangan']);
                } else if ($ajuan->jenis == 'Surat Kematian') {
                    $pdf = \PDF::loadView('arsip.sk', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Kematian']);
                } else if ($ajuan->jenis == 'Surat Keterangan Usaha') {
                    $pdf = \PDF::loadView('arsip.sku', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Usaha']);
                } else if ($ajuan->jenis == 'SKCK') {
                    $pdf = \PDF::loadView('arsip.skck', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKCK']);
                } else if ($ajuan->jenis == 'SKTM') {
                    $pdf = \PDF::loadView('arsip.sktm', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKTM']);
                }
            } else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        } else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }

    public function download($id)
    {
        $user_id = auth('api')->user()->id;
        $ajuan = Ajuan::find($id);
        $data['user'] = User::find($ajuan->user_id);
        $data['ajuan'] = $ajuan;

        if ($ajuan->acc == 1) {
            if ($ajuan->user_id == $user_id) {
                if ($ajuan->jenis == 'Surat Domisili') {
                    $pdf = \PDF::loadView('arsip.domisili', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Domisili.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Ahli Waris') {
                    $pdf = \PDF::loadView('arsip.ahli-waris', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Ahli Waris.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Penganut Kepercayaan Tuhan YME') {
                    $pdf = \PDF::loadView('arsip.penganut', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Penganut Kepercayaan Tuhan YME.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME') {
                    $pdf = \PDF::loadView('arsip.batal-menganut', $data);
                    return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME']);
                } else if ($ajuan->jenis == 'Surat Keterangan Diluar Kota') {
                    $pdf = \PDF::loadView('arsip.diluar-kota', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Diluar Kota.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Kebakaran') {
                    $pdf = \PDF::loadView('arsip.kebakaran', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Kebakaran.pdf']);
                } else if ($ajuan->jenis == 'Surat Izin Keramaian') {
                    $pdf = \PDF::loadView('arsip.izin-keramaian', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Izin Keramaian.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Beda Nama') {
                    $pdf = \PDF::loadView('arsip.beda-nama', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Beda Nama.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Tidak Masuk Kerja') {
                    $pdf = \PDF::loadView('arsip.tidak-kerja', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Tidak Masuk Kerja.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Izin Orang Tua') {
                    $pdf = \PDF::loadView('arsip.izin-ortu', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Izin Orang Tua.pdf']);
                } else if ($ajuan->jenis == 'Surat Kuasa') {
                    $pdf = \PDF::loadView('arsip.kuasa', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Kuasa.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Janda Duda') {
                    $pdf = \PDF::loadView('arsip.janda-duda', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Janda Duda.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Belum Menikah') {
                    $pdf = \PDF::loadView('arsip.belum-menikah', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Belum Menikah.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Serbaguna') {
                    $pdf = \PDF::loadView('arsip.serbaguna', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Serbaguna.pdf']);
                } else if ($ajuan->jenis == 'Surat KTP Expire') {
                    $pdf = \PDF::loadView('arsip.ktp-expire', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat KTP Expire.pdf']);
                } else if ($ajuan->jenis == 'Surat Penghasilan') {
                    $pdf = \PDF::loadView('arsip.penghasilan', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Penghasilan.pdf']);
                } else if ($ajuan->jenis == 'Surat Kehilangan') {
                    $pdf = \PDF::loadView('arsip.kehilangan', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Kehilangan.pdf']);
                } else if ($ajuan->jenis == 'Surat Kematian') {
                    $pdf = \PDF::loadView('arsip.sk', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Kematian.pdf']);
                } else if ($ajuan->jenis == 'Surat Keterangan Usaha') {
                    $pdf = \PDF::loadView('arsip.sku', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'Surat Keterangan Usaha.pdf']);
                } else if ($ajuan->jenis == 'SKCK') {
                    $pdf = \PDF::loadView('arsip.skck', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKCK.pdf']);
                } else if ($ajuan->jenis == 'SKTM') {
                    $pdf = \PDF::loadView('arsip.sktm', $data);
                   return response()->json(['pdf' => base64_encode($pdf->output()), 'file_name' => 'SKTM.pdf']);
                }
            } else {
                return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
            }
        } else {
            return response()->json(['message' => 'Anda tidak memiliki akses kesini'], 404);
        }
    }
}
