<?php

namespace App\Http\Controllers\Api;

use App\Ajuan;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjuanController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

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
    
            $user = auth('api')->user(); 
            $ajuan = $user->ajuans()->where('jenis', 'Surat Keterangan Kebakaran');
            $cek = $ajuan->get();

            if ($cek->count() != 0) {
                if ($ajuan->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->kebakaran()->create($kebakaran);

                    $response = [
                        'message' => 'Ajuan Surat Keterangan Kebakaran berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Kebakaran lagi. Tunggu sampai Surat Keterangan Kebakaran Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Kebakaran Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->kebakaran()->create($kebakaran);

                $response = [
                    'message' => 'Ajuan Surat Keterangan Kebakaran berhasil diajukan',
                ];
                return response()->json($response, 200);
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

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Penganut Kepercayaan Tuhan YME')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Penganut Kepercayaan Tuhan YME')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->penganut()->create($penganut);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Penganut Kepercayaan Tuhan YME  berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Penganut Kepercayaan Tuhan YME lagi. Tunggu sampai Surat Keterangan Penganut Kepercayaan Tuhan YME Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Penganut Kepercayaan Tuhan YME Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->penganut()->create($penganut);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Penganut Kepercayaan Tuhan YME  berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME') {
            $batalMenganut = $request->validate([
                'organisasi' => 'required',
                'agama_baru' => 'required',
                'tanggal_perubahan' => 'required',
                'dasar_perubahan' => 'required',
            ]);
            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Batal Menganut Kepercayaan Tuhan YME')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->batalMenganut()->create($batalMenganut);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Batal Menganut Kepercayaan Tuhan YME  berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Batal Menganut Kepercayaan Tuhan YME lagi. Tunggu sampai Surat Keterangan Batal Menganut Kepercayaan Tuhan YME Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Batal Menganut Kepercayaan Tuhan YME Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->batalMenganut()->create($batalMenganut);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Batal Menganut Kepercayaan Tuhan YME  berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Domisili') {
            $domisili = $request->validate([
                'tanggal' => 'required',
            ]);
            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Domisili')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Domisili')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->domisili()->create($domisili);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Domisili berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Domisili lagi. Tunggu sampai Surat Keterangan Domisili Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Domisili Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->domisili()->create($domisili);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Domisili berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Izin Keramaian') {
            $izinKeramaian = $request->validate([
                'hari' => 'required',
                'tanggal' => 'required',
                'tempat' => 'required',
            ]);

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Izin Keramaian')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Izin Keramaian')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->izinKeramaian()->create($izinKeramaian);
                    $response = [
                        'message' => 'Ajuan Surat Izin Keramaian berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Izin Keramaian lagi. Tunggu sampai Surat Izin Keramaian Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Izin Keramaian Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->izinKeramaian()->create($izinKeramaian);
                $response = [
                    'message' => 'Ajuan Surat Izin Keramaian berhasil diajukan',
                ];
                return response()->json($response, 200);
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

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Beda Nama')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Beda Nama')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->bedaNama()->create($bedaNama);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Beda Nama berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Beda Nama lagi. Tunggu sampai Surat Keterangan Beda Nama Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Beda Nama Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->bedaNama()->create($bedaNama);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Beda Nama berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Keterangan Ahli Waris') {
            $ahliWaris = $request->validate([
                'hubungan' => 'required',
                'nama_pewaris' => 'required',
                'kejadian' => 'required',
                'tanggal' => 'required',
            ]);

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Ahli Waris')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Ahli Waris')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->ahliWaris()->create($ahliWaris);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Ahli Waris berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Ahli Waris lagi. Tunggu sampai Surat Keterangan Ahli Waris Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Ahli Waris Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->ahliWaris()->create($ahliWaris);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Ahli Waris berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Keterangan Tidak Masuk Kerja') {
            $tidakKerja = $request->validate([
                'alasan' => 'required',
                'hari' => 'required',
                'tanggal' => 'required',
                'perusahaan' => 'required',
            ]);

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Tidak Masuk Kerja')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Tidak Masuk Kerja')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->tidakKerja()->create($tidakKerja);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Tidak Masuk Kerja berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Tidak Masuk Kerja lagi. Tunggu sampai Surat Keterangan Tidak Masuk Kerja Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Tidak Masuk Kerja Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->tidakKerja()->create($tidakKerja);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Tidak Masuk Kerja berhasil diajukan',
                ];
                return response()->json($response, 200);
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

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Izin Orang Tua')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Izin Orang Tua')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->izinOrtu()->create($izinOrtu);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Izin Orang Tua berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Izin Orang Tua lagi. Tunggu sampai Surat Keterangan Izin Orang Tua Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Izin Orang Tua Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->izinOrtu()->create($izinOrtu);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Izin Orang Tua berhasil diajukan',
                ];
                return response()->json($response, 200);
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

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Kuasa')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Kuasa')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->kuasa()->create($kuasa);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Kuasa berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Kuasa lagi. Tunggu sampai Surat Keterangan Kuasa Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Kuasa Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->kuasa()->create($kuasa);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Kuasa berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Keterangan Diluar Kota') {

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Diluar Kota')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Diluar Kota')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->diluarKota()->create();
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Diluar Kota berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Diluar Kota lagi. Tunggu sampai Surat Keterangan Diluar Kota Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Diluar Kota Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->diluarKota()->create();
                $response = [
                    'message' => 'Ajuan Surat Keterangan Diluar Kota berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Keterangan Belum Menikah') {

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Belum Menikah')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Belum Menikah')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->belumMenikah()->create();
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Belum Menikah berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Belum Menikah lagi. Tunggu sampai Surat Keterangan Belum Menikah Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Belum Menikah Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->belumMenikah()->create();
                $response = [
                    'message' => 'Ajuan Surat Keterangan Belum Menikah berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Keterangan Janda Duda') {
            $jandaduda = $request->validate([
                'janda_duda' => 'required',
                'kepemilikan' => 'required',
                'pasangan' => 'required',
            ]);
            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Janda Duda')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Janda Duda')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->jandaDuda()->create($jandaduda);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Janda Duda berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Janda Duda lagi. Tunggu sampai Surat Keterangan Janda Duda Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Janda Duda Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->jandaDuda()->create($jandaduda);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Janda Duda berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Keterangan Serbaguna') {
            $serbaguna = $request->validate([
                'isi' => 'required',
            ]);

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Serbaguna')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Serbaguna')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->serbaguna()->create($serbaguna);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Serbaguna berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Serbaguna lagi. Tunggu sampai Surat Keterangan Serbaguna Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Serbaguna Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->serbaguna()->create($serbaguna);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Serbaguna berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat KTP Expire') {
            $ktpExpire = $request->validate([
                'noblanko' => 'required',
                'masa' => 'required',
            ]);

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat KTP Expire')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat KTP Expire')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->ktpExpire()->create($ktpExpire);
                    $response = [
                        'message' => 'Ajuan Surat  KTP Expire berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat  KTP Expire lagi. Tunggu sampai Surat  KTP Expire Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat  KTP Expire Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->ktpExpire()->create($ktpExpire);
                $response = [
                    'message' => 'Ajuan Surat  KTP Expire berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Penghasilan') {
            $penghasilan = $request->validate([
                'besar' => 'required',
            ]);

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Penghasilan')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Penghasilan')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->penghasilan()->create($penghasilan);
                    $response = [
                        'message' => 'Ajuan Surat Penghasilan berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Penghasilan lagi. Tunggu sampai Surat Penghasilan Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Penghasilan Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->penghasilan()->create($penghasilan);
                $response = [
                    'message' => 'Ajuan Surat Penghasilan berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'Surat Kehilangan') {
            $kehilangan = $request->validate([
                'barang' => 'required',
                'lokasi' => 'required',
                'tanggal' => 'required',
            ]);

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Kehilangan')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Kehilangan')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->kehilangan()->create($kehilangan);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Kehilangan berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Kehilangan lagi. Tunggu sampai Surat Keterangan Kehilangan Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Kehilangan Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->kehilangan()->create($kehilangan);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Kehilangan berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'SKCK') {

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'SKCK')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'SKCK')->where('acc', 0)->doesntExist()) {
                    $ajuan->create($data);
                    $response = [
                        'message' => 'Ajuan SKCK berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan SKCK lagi. Tunggu sampai SKCK Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan SKCK Anda yang sebelumnya'], 404);
                }
            } else {
                $ajuan->create($data);
                $response = [
                    'message' => 'Ajuan SKCK berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }

        if ($request->jenis == 'SKTM') {

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'SKTM')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'SKTM')->where('acc', 0)->doesntExist()) {
                    $ajuan->create($data);
                    $response = [
                        'message' => 'Ajuan SKTM berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan SKTM lagi. Tunggu sampai SKTM Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan SKTM Anda yang sebelumnya'], 404);
                }
            } else {
                $ajuan->create($data);
                $response = [
                    'message' => 'Ajuan SKTM berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }


        if ($request->jenis == 'Surat Keterangan Usaha') {
            $sku = $request->validate([
                'nama_usaha' => 'required', 'alamat_usaha' => 'required',
            ]);

            $user = auth('api')->user(); 

            $ajuan = $user->ajuans();
            $cek = $ajuan->where('jenis', 'Surat Keterangan Usaha')->get();
            if ($cek->count() != 0) {
                if ($ajuan->where('jenis', 'Surat Keterangan Usaha')->where('acc', 0)->doesntExist()) {
                    $aj = $ajuan->create($data);
                    $aj->sku()->create($sku);
                    $response = [
                        'message' => 'Ajuan Surat Keterangan Usaha berhasil diajukan',
                    ];
                    return response()->json($response, 200);
                } else {
                    return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Usaha lagi. Tunggu sampai Surat Keterangan Usaha Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Usaha Anda yang sebelumnya'], 404);
                }
            } else {
                $aj = $ajuan->create($data);
                $aj->sku()->create($sku);
                $response = [
                    'message' => 'Ajuan Surat Keterangan Usaha berhasil diajukan',
                ];
                return response()->json($response, 200);
            }
        }
    }


    // DELETE
    public function destroy($id)
    {

        $ajuan = Ajuan::findOrFail($id);

        if (!$ajuan->delete()) {
            return response()->json([
                'message' => 'Gagal Menghapus Sktb'
            ], 404);
        }

        $response = [
            'message' => 'Ajuan Berhasil dihapus',
        ];

        return response()->json($response, 200);
    }

    // CREATE
    // public function kebakaranForm()
    // {
    //     return view('form-ajuan.kebakaran');
    // }

    // public function penganutForm()
    // {
    //     return view('form-ajuan.penganut');
    // }

    // public function batalMenganutForm()
    // {
    //     return view('form-ajuan.batal-menganut');
    // }

    // public function izinKeramaianForm()
    // {
    //     return view('form-ajuan.izin-keramaian');
    // }

    // public function bedaNamaForm()
    // {
    //     return view('form-ajuan.beda-nama');
    // }

    // public function ahliWarisForm()
    // {
    //     return view('form-ajuan.ahli-waris');
    // }

    // public function izinOrtuForm()
    // {
    //     return view('form-ajuan.izin-ortu');
    // }

    // public function tidakKerjaForm()
    // {
    //     return view('form-ajuan.tidak-kerja');
    // }

    // public function diluarKotaForm()
    // {
    //     return view('form-ajuan.diluar-kota');
    // }

    // public function kuasaForm()
    // {
    //     return view('form-ajuan.kuasa');
    // }

    // public function jandaDudaForm()
    // {
    //     return view('form-ajuan.janda-duda');
    // }

    // public function belumMenikahForm()
    // {
    //     return view('form-ajuan.belum-menikah');
    // }

    // public function serbagunaForm()
    // {
    //     return view('form-ajuan.serbaguna');
    // }

    // public function penghasilanForm()
    // {
    //     return view('form-ajuan.penghasilan');
    // }

    // public function kehilanganForm()
    // {
    //     return view('form-ajuan.kehilangan');
    // }

    // public function ktpExpireForm()
    // {
    //     return view('form-ajuan.ktp-expire');
    // }

    // public function sdForm()
    // {
    //     return view('form-ajuan.sd');
    // }

    // public function skForm()
    // {
    //     return view('form-ajuan.sk');
    // }
}
