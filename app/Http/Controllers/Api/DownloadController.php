<?php

namespace App\Http\Controllers\User;

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
        }
    }
    public function puskesosDownload($id)
    {
        $user_id = auth('api')->user()->id;
        $puskesos = Puskesos::find($id);
        $data['puskesos'] = $puskesos;
        if ($puskesos->acc == 1) {
            if ($puskesos->user_id == $user_id) {
                if ($puskesos->keterangan == 'Perbaikan Data Pada Kartu Indonesia Sehat.pdf') {
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
                return $pdf->stream('Surat Keterangan Tanah Bangunan.pdf');
            }
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
                return $pdf->download('Surat Keterangan Tanah Bangunan.pdf');
            }
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
                    return $pdf->stream('Surat Keterangan Kepala Desa.pdf');
                }
                if ($sktb->jenis == 'Surat Keterangan Tanah Bangunan 2') {
                    $pdf = \PDF::loadView('arsip.skkd2', $data);
                    return $pdf->stream('Surat Keterangan Kepala Desa.pdf');
                }
            }
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
                    return $pdf->stream('Surat Keterangan Kepala Desa.pdf');
                }
                if ($sktb->jenis == 'Surat Keterangan Tanah Bangunan 2') {
                    $pdf = \PDF::loadView('arsip.skkd2', $data);
                    return $pdf->stream('Surat Keterangan Kepala Desa.pdf');
                }
            }
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
                return $pdf->stream('Surat Keterangan Usaha.pdf');
            }
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
                return $pdf->download('Surat Keterangan Usaha.pdf');
            }
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
                return $pdf->stream('SKTM Pemohon.pdf');
            }
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
                return $pdf->download('SKTM Pemohon.pdf');
            }
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
                return $pdf->download('SKTM Anak.pdf');
            }
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
                return $pdf->stream('SKTM Anak.pdf');
            }
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
                return $pdf->stream('Surat Keterangan Catatan Kepolisian.pdf');
            }
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
                return $pdf->download('Surat Keterangan Catatan Kepolisian.pdf');
            }
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
                return $pdf->download('SKCK Semi.pdf');
            }
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
                return $pdf->download('SKCK Lengkap.pdf');
            }
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
                return $pdf->stream('SKCK Semi.pdf');
            }
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
                return $pdf->stream('SKCK Lengkap.pdf');
            }
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
                return $pdf->download('Surat Pernyataan Keramaian.pdf');
            }
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
                return $pdf->stream('Surat Pernyataan Keramaian.pdf');
            }
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
                return $pdf->download('Surat Pernyataan Domisili.pdf');
            }
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
                return $pdf->stream('Surat Pernyataan Domisili.pdf');
            }
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
                return $pdf->download('Surat Permohonan Cetak KK Bagi Penganut.pdf');
            }
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
                return $pdf->stream('Surat Permohonan Cetak KK Bagi Penganut.pdf');
            }
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
                return $pdf->download('Surat Pernyataan Tanggung Jawab.pdf');
            }
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
                return $pdf->stream('Surat Pernyataan Tanggung Jawab.pdf');
            }
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
                    return $pdf->stream('Surat Domisili.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Kebakaran') {
                    $pdf = \PDF::loadView('arsip.kebakaran', $data);
                    return $pdf->stream('Surat Keterangan Kebakaran.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Penganut Kepercayaan Tuhan YME') {
                    $pdf = \PDF::loadView('arsip.penganut', $data);
                    return $pdf->stream('Surat Keterangan Penganut Kepercayaan Tuhan YME');
                } else if ($ajuan->jenis == 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME') {
                    $pdf = \PDF::loadView('arsip.batal-menganut', $data);
                    return $pdf->stream('Surat Keterangan Batal Menganut Kepercayaan Tuhan YME');
                } else if ($ajuan->jenis == 'Surat Keterangan Diluar Kota') {
                    $pdf = \PDF::loadView('arsip.diluar-kota', $data);
                    return $pdf->stream('Surat Keterangan Diluar Kota.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Ahli Waris') {
                    $pdf = \PDF::loadView('arsip.ahli-waris', $data);
                    return $pdf->stream('Surat Keterangan Ahli Waris.pdf');
                } else if ($ajuan->jenis == 'Surat Izin Keramaian') {
                    $pdf = \PDF::loadView('arsip.izin-keramaian', $data);
                    return $pdf->stream('Surat Izin Keramaian.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Beda Nama') {
                    $pdf = \PDF::loadView('arsip.beda-nama', $data);
                    return $pdf->stream('Surat Keterangan Beda Nama.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Tidak Masuk Kerja') {
                    $pdf = \PDF::loadView('arsip.tidak-kerja', $data);
                    return $pdf->stream('Surat Keterangan Tidak Masuk Kerja.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Izin Orang Tua') {
                    $pdf = \PDF::loadView('arsip.izin-ortu', $data);
                    return $pdf->stream('Surat Keterangan Izin Orang Tua.pdf');
                } else if ($ajuan->jenis == 'Surat Kuasa') {
                    $pdf = \PDF::loadView('arsip.kuasa', $data);
                    return $pdf->stream('Surat Kuasa.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Janda Duda') {
                    $pdf = \PDF::loadView('arsip.janda-duda', $data);
                    return $pdf->stream('Surat Keterangan Janda Duda.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Belum Menikah') {
                    $pdf = \PDF::loadView('arsip.belum-menikah', $data);
                    return $pdf->stream('Surat Keterangan Belum Menikah.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Serbaguna') {
                    $pdf = \PDF::loadView('arsip.serbaguna', $data);
                    return $pdf->stream('Surat Keterangan Serbaguna.pdf');
                } else if ($ajuan->jenis == 'Surat KTP Expire') {
                    $pdf = \PDF::loadView('arsip.ktp-expire', $data);
                    return $pdf->stream('Surat Keterangan KTP Expire.pdf');
                } else if ($ajuan->jenis == 'Surat Penghasilan') {
                    $pdf = \PDF::loadView('arsip.penghasilan', $data);
                    return $pdf->stream('Surat Keterangan Penghasilan.pdf');
                } else if ($ajuan->jenis == 'Surat Kehilangan') {
                    $pdf = \PDF::loadView('arsip.kehilangan', $data);
                    return $pdf->stream('Surat Keterangan Kehilangan.pdf');
                } else if ($ajuan->jenis == 'Surat Kematian') {
                    $pdf = \PDF::loadView('arsip.sk', $data);
                    return $pdf->stream('Surat Kematian.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Usaha') {
                    $pdf = \PDF::loadView('arsip.sku', $data);
                    return $pdf->stream('Surat Keterangan Usaha.pdf');
                } else if ($ajuan->jenis == 'SKCK') {
                    $pdf = \PDF::loadView('arsip.skck', $data);
                    return $pdf->stream('SKCK.pdf');
                } else if ($ajuan->jenis == 'SKTM') {
                    $pdf = \PDF::loadView('arsip.sktm', $data);
                    return $pdf->stream('SKTM.pdf');
                }
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
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
                    return $pdf->download('Surat Domisili.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Ahli Waris') {
                    $pdf = \PDF::loadView('arsip.ahli-waris', $data);
                    return $pdf->download('Surat Keterangan Ahli Waris');
                } else if ($ajuan->jenis == 'Surat Keterangan Penganut Kepercayaan Tuhan YME') {
                    $pdf = \PDF::loadView('arsip.penganut', $data);
                    return $pdf->download('Surat Keterangan Penganut Kepercayaan Tuhan YME');
                } else if ($ajuan->jenis == 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME') {
                    $pdf = \PDF::loadView('arsip.batal-menganut', $data);
                    return $pdf->download('Surat Keterangan Batal Menganut Kepercayaan Tuhan YME');
                } else if ($ajuan->jenis == 'Surat Keterangan Diluar Kota') {
                    $pdf = \PDF::loadView('arsip.diluar-kota', $data);
                    return $pdf->download('Surat Keterangan Diluar Kota.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Kebakaran') {
                    $pdf = \PDF::loadView('arsip.kebakaran', $data);
                    return $pdf->download('Surat Keterangan Kebakaran.pdf');
                } else if ($ajuan->jenis == 'Surat Izin Keramaian') {
                    $pdf = \PDF::loadView('arsip.izin-keramaian', $data);
                    return $pdf->download('Surat Izin Keramaian.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Beda Nama') {
                    $pdf = \PDF::loadView('arsip.beda-nama', $data);
                    return $pdf->download('Surat Keterangan Beda Nama.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Tidak Masuk Kerja') {
                    $pdf = \PDF::loadView('arsip.tidak-kerja', $data);
                    return $pdf->download('Surat Keterangan Tidak Masuk Kerja.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Izin Orang Tua') {
                    $pdf = \PDF::loadView('arsip.izin-ortu', $data);
                    return $pdf->download('Surat Keterangan Izin Orang Tua.pdf');
                } else if ($ajuan->jenis == 'Surat Kuasa') {
                    $pdf = \PDF::loadView('arsip.kuasa', $data);
                    return $pdf->download('Surat Kuasa.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Janda Duda') {
                    $pdf = \PDF::loadView('arsip.janda-duda', $data);
                    return $pdf->download('Surat Keterangan Janda Duda.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Belum Menikah') {
                    $pdf = \PDF::loadView('arsip.belum-menikah', $data);
                    return $pdf->download('Surat Keterangan Belum Menikah.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Serbaguna') {
                    $pdf = \PDF::loadView('arsip.serbaguna', $data);
                    return $pdf->download('Surat Keterangan Serbaguna.pdf');
                } else if ($ajuan->jenis == 'Surat KTP Expire') {
                    $pdf = \PDF::loadView('arsip.ktp-expire', $data);
                    return $pdf->download('Surat Keterangan KTP Expire.pdf');
                } else if ($ajuan->jenis == 'Surat Penghasilan') {
                    $pdf = \PDF::loadView('arsip.penghasilan', $data);
                    return $pdf->download('Surat Keterangan Penghasilan.pdf');
                } else if ($ajuan->jenis == 'Surat Kehilangan') {
                    $pdf = \PDF::loadView('arsip.kehilangan', $data);
                    return $pdf->download('Surat Keterangan Kehilangan.pdf');
                } else if ($ajuan->jenis == 'Surat Kematian') {
                    $pdf = \PDF::loadView('arsip.sk', $data);
                    return $pdf->download('Surat Kematian.pdf');
                } else if ($ajuan->jenis == 'Surat Keterangan Usaha') {
                    $pdf = \PDF::loadView('arsip.sku', $data);
                    return $pdf->download('Surat Keterangan Usaha.pdf');
                } else if ($ajuan->jenis == 'SKCK') {
                    $pdf = \PDF::loadView('arsip.skck', $data);
                    return $pdf->download('SKCK.pdf');
                } else if ($ajuan->jenis == 'SKTM') {
                    $pdf = \PDF::loadView('arsip.sktm', $data);
                    return $pdf->download('SKTM.pdf');
                }
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
    }
}
