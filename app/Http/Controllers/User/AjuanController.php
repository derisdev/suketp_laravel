<?php

namespace App\Http\Controllers\User;

use App\Ajuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjuanController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);

        if ($request->jenis == 'Surat Keterangan Kebakaran') {
            $kebakaran = $request->validate([
                'barang' => 'required',
                'tanggal' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Kebakaran')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Kebakaran')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->kebakaran()->create($kebakaran);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Kebakaran berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Kebakaran lagi. Tunggu sampai Surat Keterangan Kebakaran Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Kebakaran Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->kebakaran()->create($kebakaran);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Kebakaran berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Penganut Kepercayaan Tuhan YME') {
            $penganut = $request->validate([
                'organisasi' => 'required',
                'saksi_1' => 'required',
                'agama_sebelumnya' => 'required',
                'dasar_perubahan' => 'required',
                'tanggal_perubahan' => 'required',
                'saksi_2' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Penganut Kepercayaan Tuhan YME')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Penganut Kepercayaan Tuhan YME')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->penganut()->create($penganut);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Penganut Kepercayaan Tuhan YME berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Penganut Kepercayaan Tuhan YME lagi. Tunggu sampai Surat Keterangan Penganut Kepercayaan Tuhan YME Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Penganut Kepercayaan Tuhan YME Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->penganut()->create($penganut);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Penganut Kepercayaan Tuhan YME berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME') {
            $batalMenganut = $request->validate([
                'organisasi' => 'required',
                'agama_baru' => 'required',
                'tanggal_perubahan' => 'required',
                'dasar_perubahan' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->batalMenganut()->create($batalMenganut);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Batal Menganut Kepercayaan Tuhan YME lagi. Tunggu sampai Surat Keterangan Batal Menganut Kepercayaan Tuhan YME Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Batal Menganut Kepercayaan Tuhan YME Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->batalMenganut()->create($batalMenganut);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Domisili') {
            $domisili = $request->validate([
                'tanggal' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Domisili')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Domisili')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->domisili()->create($domisili);
                    return redirect(route('suratsaya'))->with('status', 'Surat Domisili berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Domisili lagi. Tunggu sampai Surat Domisili Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Domisili Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->domisili()->create($domisili);
                return redirect(route('suratsaya'))->with('status', 'Surat Domisili berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Izin Keramaian') {
            $izinKeramaian = $request->validate([
                'hari' => 'required',
                'tanggal' => 'required',
                'tempat' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Izin Keramaian')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Izin Keramaian')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->izinKeramaian()->create($izinKeramaian);
                    return redirect(route('suratsaya'))->with('status', 'Surat Izin Keramaian berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Izin Keramaian lagi. Tunggu sampai Surat Izin Keramaian Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Izin Keramaian Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->izinKeramaian()->create($izinKeramaian);
                return redirect(route('suratsaya'))->with('status', 'Surat Izin Keramaian berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Beda Nama') {
            $bedaNama = $request->validate([
                'perbedaan' => 'required',
                'dokumen_salah' => 'required',
                'tertulis_salah' => 'required',
                'dokumen_benar' => 'required',
                'tertulis_benar' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Beda Nama')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Beda Nama')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->bedaNama()->create($bedaNama);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Beda Nama berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Beda Nama lagi. Tunggu sampai Surat Keterangan Beda Nama Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Beda Nama Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->bedaNama()->create($bedaNama);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Beda Nama berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Ahli Waris') {
            $ahliWaris = $request->validate([
                'hubungan' => 'required',
                'nama_pewaris' => 'required',
                'kejadian' => 'required',
                'tanggal' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Ahli Waris')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Ahli Waris')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->ahliWaris()->create($ahliWaris);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Ahli Waris berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Ahli Waris lagi. Tunggu sampai Surat Keterangan Ahli Waris Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Ahli Waris Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->ahliWaris()->create($ahliWaris);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Ahli Waris berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Tidak Masuk Kerja') {
            $tidakKerja = $request->validate([
                'alasan' => 'required',
                'hari' => 'required',
                'tanggal' => 'required',
                'perusahaan' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Tidak Masuk Kerja')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Tidak Masuk Kerja')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->tidakKerja()->create($tidakKerja);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Tidak Masuk Kerja berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Tidak Masuk Kerja lagi. Tunggu sampai Surat Keterangan Tidak Masuk Kerja Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Tidak Masuk Kerja Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->tidakKerja()->create($tidakKerja);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Tidak Masuk Kerja berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Izin Orang Tua') {
            $izinOrtu = $request->validate([
                'hubungan' => 'required',
                'nama' => 'required',
                'nik' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Izin Orang Tua')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Izin Orang Tua')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->izinOrtu()->create($izinOrtu);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Izin Orang Tua berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Izin Orang Tua lagi. Tunggu sampai Surat Keterangan Izin Orang Tua Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Izin Orang Tua Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->izinOrtu()->create($izinOrtu);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Izin Orang Tua berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Kuasa') {
            $kuasa = $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'umur' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Kuasa')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Kuasa')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->kuasa()->create($kuasa);
                    return redirect(route('suratsaya'))->with('status', 'Surat Kuasa berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Kuasa lagi. Tunggu sampai Surat Kuasa Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Kuasa Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->kuasa()->create($kuasa);
                return redirect(route('suratsaya'))->with('status', 'Surat Kuasa berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Diluar Kota') {
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Diluar Kota')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Diluar Kota')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->diluarKota()->create();
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Diluar Kota berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Diluar Kota lagi. Tunggu sampai Surat Keterangan Diluar Kota Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Diluar Kota Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->diluarKota()->create();
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Diluar Kota berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Belum Menikah') {
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Belum Menikah')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Belum Menikah')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->belumMenikah()->create();
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Belum Menikah berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Belum Menikah lagi. Tunggu sampai Surat Keterangan Belum Menikah Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Belum Menikah Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->belumMenikah()->create();
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Belum Menikah berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Janda Duda') {
            $jandaduda = $request->validate([
                'janda_duda' => 'required',
                'kepemilikan' => 'required',
                'pasangan' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Janda Duda')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Janda Duda')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->jandaDuda()->create($jandaduda);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Janda Duda berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Janda Duda lagi. Tunggu sampai Surat Keterangan Janda Duda Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Janda Duda Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->jandaDuda()->create($jandaduda);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Janda Duda berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Serbaguna') {
            $serbaguna = $request->validate([
                'isi' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Serbaguna')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Serbaguna')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->serbaguna()->create($serbaguna);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Serbaguna berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Serbaguna lagi. Tunggu sampai Surat Keterangan Serbaguna Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Serbaguna Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->serbaguna()->create($serbaguna);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Serbaguna berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat KTP Expire') {
            $ktpExpire = $request->validate([
                'noblanko' => 'required',
                'masa' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat KTP Expire')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat KTP Expire')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->ktpExpire()->create($ktpExpire);
                    return redirect(route('suratsaya'))->with('status', 'Surat KTP Expire berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat KTP Expire lagi. Tunggu sampai Surat KTP Expire Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat KTP Expire Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->ktpExpire()->create($ktpExpire);
                return redirect(route('suratsaya'))->with('status', 'Surat KTP Expire berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Penghasilan') {
            $penghasilan = $request->validate([
                'besar' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Penghasilan')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Penghasilan')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->penghasilan()->create($penghasilan);
                    return redirect(route('suratsaya'))->with('status', 'Surat Penghasilan berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Penghasilan lagi. Tunggu sampai Surat Penghasilan Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Penghasilan Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->penghasilan()->create($penghasilan);
                return redirect(route('suratsaya'))->with('status', 'Surat Penghasilan berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Kehilangan') {
            $kehilangan = $request->validate([
                'barang' => 'required',
                'lokasi' => 'required',
                'tanggal' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Kehilangan')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Kehilangan')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->kehilangan()->create($kehilangan);
                    return redirect(route('suratsaya'))->with('status', 'Surat Kehilangan berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Kehilangan lagi. Tunggu sampai Surat Kehilangan Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Kehilangan Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->kehilangan()->create($kehilangan);
                return redirect(route('suratsaya'))->with('status', 'Surat Kehilangan berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'SKCK') {
            $cek = auth()->user()->ajuans()->where('jenis', 'SKCK')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'SKCK')->where('acc', 0)->doesntExist()) {
                    auth()->user()->ajuans()->create($data);
                    return redirect(route('suratsaya'))->with('status', 'SKCK berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan SKCK lagi. Tunggu sampai SKCK Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan SKCK Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                auth()->user()->ajuans()->create($data);
                return redirect(route('suratsaya'))->with('status', 'SKCK berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'SKTM') {
            $cek = auth()->user()->ajuans()->where('jenis', 'SKTM')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'SKTM')->where('acc', 0)->doesntExist()) {
                    auth()->user()->ajuans()->create($data);
                    return redirect(route('suratsaya'))->with('status', 'SKTM berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan SKTM lagi. Tunggu sampai SKTM Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan SKTM Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                auth()->user()->ajuans()->create($data);
                return redirect(route('suratsaya'))->with('status', 'SKTM berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }


        if ($request->jenis == 'Surat Keterangan Usaha') {
            $sku = $request->validate([
                'nama_usaha' => 'required', 'alamat_usaha' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Usaha')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Usaha')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->sku()->create($sku);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Usaha berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Usaha lagi. Tunggu sampai Surat Keterangan Usaha Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Usaha Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->sku()->create($sku);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Usaha berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }
    }


    // DELETE
    public function destroy($id)
    {
        $ajuan = Ajuan::where('id', $id);
        $ajuan->delete();
        return redirect()->back();
    }

    // CREATE
    public function kebakaranForm()
    {
        return view('form-ajuan.kebakaran');
    }

    public function penganutForm()
    {
        return view('form-ajuan.penganut');
    }

    public function batalMenganutForm()
    {
        return view('form-ajuan.batal-menganut');
    }

    public function izinKeramaianForm()
    {
        return view('form-ajuan.izin-keramaian');
    }

    public function bedaNamaForm()
    {
        return view('form-ajuan.beda-nama');
    }

    public function ahliWarisForm()
    {
        return view('form-ajuan.ahli-waris');
    }

    public function izinOrtuForm()
    {
        return view('form-ajuan.izin-ortu');
    }

    public function tidakKerjaForm()
    {
        return view('form-ajuan.tidak-kerja');
    }

    public function diluarKotaForm()
    {
        return view('form-ajuan.diluar-kota');
    }

    public function kuasaForm()
    {
        return view('form-ajuan.kuasa');
    }

    public function jandaDudaForm()
    {
        return view('form-ajuan.janda-duda');
    }

    public function belumMenikahForm()
    {
        return view('form-ajuan.belum-menikah');
    }

    public function serbagunaForm()
    {
        return view('form-ajuan.serbaguna');
    }

    public function penghasilanForm()
    {
        return view('form-ajuan.penghasilan');
    }

    public function kehilanganForm()
    {
        return view('form-ajuan.kehilangan');
    }

    public function ktpExpireForm()
    {
        return view('form-ajuan.ktp-expire');
    }

    public function sdForm()
    {
        return view('form-ajuan.sd');
    }

    public function skForm()
    {
        return view('form-ajuan.sk');
    }
}
