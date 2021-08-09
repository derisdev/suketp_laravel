<?php

namespace App\Http\Controllers\Admin;

use App\Sku;
use App\Skck;
use App\Sktb;
use App\Sktm;
use App\Ajuan;
use App\Kades;
use App\Puskesos;
use App\Keperluan;
use App\PesanPenolakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelahiran;

class AntrianController extends Controller
{

    // DAFTAR ANTRIAN
    public function index()
    {
        $kelahiran = Kelahiran::where('acc', 0)->oldest()->paginate();
        $sktb = Sktb::where('acc', 0)->oldest()->paginate();
        $sku = Sku::where('acc', 0)->oldest()->paginate();
        $sktm = Sktm::where('acc', 0)->oldest()->paginate();
        $skck = Skck::where('acc', 0)->oldest()->paginate();
        $puskesos = Puskesos::where('acc', 0)->oldest()->paginate();
        $antrian = Ajuan::where('acc', 0)->oldest()->paginate();
        return view('admin.antrian.index', [
            'kelahiran' => $kelahiran,
            'antrian' => $antrian,
            'sktb' => $sktb,
            'sku' => $sku,
            'sktm' => $sktm,
            'skck' => $skck,
            'puskesos' => $puskesos,
        ]);
    }

    // SHOW SURAT (ga terlalu kepake)
    public function show($id)
    {
        $ajuan = Ajuan::find($id);
        return view('admin.antrian.show', compact('ajuan'));
    }

    // HALAMAN ACC SURAT
    public function edit($id)
    {
        $ajuan = Ajuan::find($id);
        $sku = Sku::find($id);
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();
        return view('admin.antrian.edit', compact(['ajuan', 'sku', 'keperluan', 'pesan_penolakan']));
    }
    public function editSktb($id)
    {
        $sktb = Sktb::find($id);
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();
        return view('admin.antrian.non-harian.sktb.edit', compact(['sktb', 'keperluan', 'pesan_penolakan']));
    }
    public function editSku($id)
    {
        $sku = Sku::find($id);
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();
        return view('admin.antrian.non-harian.sku.edit', compact(['sku', 'keperluan', 'pesan_penolakan']));
    }
    public function editKelahiran($id)
    {
        $kelahiran = Kelahiran::find($id);
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();
        return view('admin.antrian.non-harian.kelahiran.edit', compact(['kelahiran', 'keperluan', 'pesan_penolakan']));
    }
    public function editSktm($id)
    {
        $sktm = Sktm::find($id);
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();
        return view('admin.antrian.non-harian.sktm.edit', compact(['sktm', 'keperluan', 'pesan_penolakan']));
    }
    public function editSkck($id)
    {
        $skck = Skck::find($id);
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();
        return view('admin.antrian.non-harian.skck.edit', compact(['skck', 'keperluan', 'pesan_penolakan']));
    }
    public function editPuskesos($id)
    {
        $puskesos = Puskesos::find($id);
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();
        return view('admin.antrian.non-harian.puskesos.edit', compact(['puskesos', 'keperluan', 'pesan_penolakan']));
    }

    // ACC SURAT
    public function update(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Ajuan::max('nomor');

            $ajuansblm = Ajuan::where('nomor', $urutan)->first();
            $bulansblm = (int)$ajuansblm->created_at->format('n');

            if ($bulan = $bulansblm) {
                $urutan = $urutan + 1;
            } else if ($bulan != $bulansblm) {
                $urutan = 1;
            }
            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'nomor' => $urutan,
                'nosurat' => $nosurat,
                'keterangan' => request('keterangan'),
            ]);

            return redirect(route('antrian.index'));
        }
    }

    // ACC SURAT NON-HARIAN
    public function updateSktb(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $sktb = Sktb::find($id);

            // penomoran surat
            $noindex = '593';
            $stringtetap = 'DES.2008';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Sktb::max('nomor');

            $sktbsblm = Sktb::where('nomor', $urutan)->first();
            $bulansblm = (int)$sktbsblm->created_at->format('n');
            if ($bulan = $bulansblm) {
                $urutan = $urutan + 1;
            } else if ($bulan != $bulansblm) {
                $urutan = 1;
            }

            $nosurat = $noindex . '/' . $urutan . '/' . $stringtetap . '/' . $bulanromawi . '/' . $tahun;

            $sktb->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'nomor' => $urutan,
                'nosurat' => $nosurat,
                'keterangan' => request('keterangan'),
            ]);
            return redirect(route('antrian.index'));
        }
    }

    public function updateSku(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $sku = Sku::find($id);

            // penomoran surat
            $noindex = '517';
            $stringtetap = 'DES.2008';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Sku::max('nomor');

            $skusblm = Sku::where('nomor', $urutan)->first();
            $bulansblm = (int)$skusblm->created_at->format('n');
            if ($bulan = $bulansblm) {
                $urutan = $urutan + 1;
            } else if ($bulan != $bulansblm) {
                $urutan = 1;
            }

            $nosurat = $noindex . '/' . $urutan . '/' . $stringtetap . '/' . $bulanromawi . '/' . $tahun;

            $sku->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'nomor' => $urutan,
                'nosurat' => $nosurat,
                'keterangan' => request('keterangan'),
            ]);
            return redirect(route('antrian.index'));
        }
    }

    public function updateSktm(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $sktm = Sktm::find($id);

            // penomoran surat
            $noindex = '420';
            $stringtetap = 'DES.2008';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Sktm::max('nomor');

            $sktmsblm = Sktm::where('nomor', $urutan)->first();
            $bulansblm = (int)$sktmsblm->created_at->format('n');
            if ($bulan = $bulansblm) {
                $urutan = $urutan + 1;
            } else if ($bulan != $bulansblm) {
                $urutan = 1;
            }

            $nosurat = $noindex . '/' . $urutan . '/' . $stringtetap . '/' . $bulanromawi . '/' . $tahun;

            $sktm->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'nomor' => $urutan,
                'nosurat' => $nosurat,
                'keterangan' => request('keterangan'),
            ]);
            return redirect(route('antrian.index'));
        }
    }

    public function updateSkck(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $skck = Skck::find($id);

            // penomoran surat
            $noindex = '146';
            $stringtetap = 'DES.2008';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Skck::max('nomor');

            $skcksblm = Skck::where('nomor', $urutan)->first();
            $bulansblm = (int)$skcksblm->created_at->format('n');
            if ($bulan = $bulansblm) {
                $urutan = $urutan + 1;
            } else if ($bulan != $bulansblm) {
                $urutan = 1;
            }

            $nosurat = $noindex . '/' . $urutan . '/' . $stringtetap . '/' . $bulanromawi . '/' . $tahun;

            $skck->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'nomor' => $urutan,
                'nosurat' => $nosurat,
                'keterangan' => request('keterangan'),
            ]);
            return redirect(route('antrian.index'));
        }
    }

    public function updatePuskesos(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $puskesos = Puskesos::find($id);

            // penomoran surat
            $noindex = '11';
            $stringtetap = 'Pusk-WA/DS.2008-37';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Puskesos::max('nomor');

            $puskesossblm = Puskesos::where('nomor', $urutan)->first();
            $bulansblm = (int)$puskesossblm->created_at->format('n');
            if ($bulan = $bulansblm) {
                $urutan = $urutan + 1;
            } else if ($bulan != $bulansblm) {
                $urutan = 1;
            }

            // $nosurat = $noindex . '/' . $urutan . '/' . $stringtetap . '/' . $bulanromawi . '/' . $tahun;
            $nosurat =  $urutan . '/' . $stringtetap . '/' . $bulanromawi . '/' . $tahun;

            $puskesos->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'nomor' => $urutan,
                'nosurat' => $nosurat,
                'keterangan' => request('keterangan'),
            ]);
            return redirect(route('antrian.index'));
        }
    }


    // TOLAK ANTRIAN
    public function tolak($id)
    {
        $ajuan = Ajuan::where('id', $id);
        $ajuan->update([
            'acc' => 2,
            'pesan_penolakan' => request('pesan_penolakan'),
        ]);
        return redirect(route('antrian.index'));
    }
    public function tolakPuskesos($id)
    {
        $puskesos = Puskesos::where('id', $id);
        $puskesos->update([
            'acc' => 2,
            'pesan_penolakan' => request('pesan_penolakan'),
        ]);
        return redirect(route('antrian.index'));
    }
    public function skuTolak($id)
    {
        $sku = Sku::where('id', $id);
        $sku->update([
            'acc' => 2,
            'pesan_penolakan' => request('pesan_penolakan'),
        ]);
        return redirect(route('antrian.index'));
    }
    public function sktbTolak($id)
    {
        $sktb = Sktb::where('id', $id);
        $sktb->update([
            'acc' => 2,
            'pesan_penolakan' => request('pesan_penolakan'),
        ]);
        return redirect(route('antrian.index'));
    }
    public function sktmTolak($id)
    {
        $sktm = Sktm::where('id', $id);
        $sktm->update([
            'acc' => 2,
            'pesan_penolakan' => request('pesan_penolakan'),
        ]);
        return redirect(route('antrian.index'));
    }
    public function skckTolak($id)
    {
        $skck = Skck::where('id', $id);
        $skck->update([
            'acc' => 2,
            'pesan_penolakan' => request('pesan_penolakan'),
        ]);
        return redirect(route('antrian.index'));
    }

    // RIWAYAT PENGAJUAN
    public function riwayatPengajuan()
    {
        return view('admin.pengajuan.index');
    }







    // FUNGSI TAMBAHAN
    function getRomawi($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}
