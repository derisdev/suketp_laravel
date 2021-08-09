<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Sktb;
use Illuminate\Http\Request;

class SktbController extends Controller
{
    public function create()
    {
        return view('form-ajuan.sktb');
    }

    public function create2()
    {
        return view('form-ajuan.sktb2');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'keterangan' => 'required',
            'jenis' => 'required',
            'pemilik' => 'required',
            'memiliki' => 'required',
            'luas' => 'required',
            'luas_persegi' => 'required',
            'lokasi' => 'required',
            'harga' => 'required',
            'harga_terbilang' => 'required',
            'total_harga' => 'required',
            'total_harga_tanah' => 'required',
            'akta' => 'required',
            'no_akta' => 'required',
            'blok' => 'required',
            'no_personil' => 'required',
            'no_kohir' => 'required',
            'utara' => 'required',
            'barat' => 'required',
            'selatan' => 'required',
            'timur' => 'required',
        ]);
        $data['nominal_bangunan'] = $request->nominal_bangunan;
        $data['terbilang_bangunan'] = $request->terbilang_bangunan;
        $cek = auth()->user()->sktb()->where('jenis', 'Surat Keterangan Tanah Bangunan')->get();
        if ($cek->count() != 0) {
            if (auth()->user()->sktb()->where('jenis', 'Surat Keterangan Tanah Bangunan')->where('acc', 0)->doesntExist()) {
                auth()->user()->sktb()->create($data);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Tanah Bangunan berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            } else {
                return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Tanah Bangunan lagi. Tunggu sampai Surat Keterangan Tanah Bangunan Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Tanah Bangunan Anda yang sebelumnya')->with('warna', 'alert-danger');
            }
        } else {
            auth()->user()->sktb()->create($data);
            return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Tanah Bangunan berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
        }
    }

    public function store2(Request $request)
    {
        $data = $request->validate([
            'keterangan' => 'required',
            'jenis' => 'required',
            'pemilik' => 'required',
            'memiliki' => 'required',
            'luas' => 'required',
            'luas_persegi' => 'required',
            'lokasi' => 'required',
            'harga' => 'required',
            'harga_terbilang' => 'required',
            'total_harga' => 'required',
            'total_harga_tanah' => 'required',
            'blok' => 'required',
            'no_shm' => 'required',
            'no_nib' => 'required',
            'no_surat_ukur' => 'required',
            'utara' => 'required',
            'barat' => 'required',
            'selatan' => 'required',
            'timur' => 'required',
            'keperluan' => 'required',
        ]);
        $data['nominal_bangunan'] = $request->nominal_bangunan;
        $data['terbilang_bangunan'] = $request->terbilang_bangunan;
        $cek = auth()->user()->sktb()->where('jenis', 'Surat Keterangan Tanah Bangunan 2')->get();
        if ($cek->count() != 0) {
            if (auth()->user()->sktb()->where('jenis', 'Surat Keterangan Tanah Bangunan 2')->where('acc', 0)->doesntExist()) {
                auth()->user()->sktb()->create($data);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Tanah Bangunan berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            } else {
                return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Tanah Bangunan lagi. Tunggu sampai Surat Keterangan Tanah Bangunan Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Tanah Bangunan Anda yang sebelumnya')->with('warna', 'alert-danger');
            }
        } else {
            auth()->user()->sktb()->create($data);
            return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Tanah Bangunan berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
        }
    }


    public function destroy($id)
    {
        $sktb = Sktb::where('id', $id);
        $sktb->delete();
        return redirect()->back();
    }
}
