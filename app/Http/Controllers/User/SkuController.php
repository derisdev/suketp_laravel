<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Sku;
use Illuminate\Http\Request;

class SkuController extends Controller
{

    public function create()
    {
        return view('form-ajuan.sku');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
        ]);
        $cek = auth()->user()->sku()->get();
        if ($cek->count() != 0) {
            if (auth()->user()->sku()->where('acc', 0)->doesntExist()) {
                auth()->user()->sku()->create($data);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Usaha berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            } else {
                return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Usaha lagi. Tunggu sampai Surat Keterangan Usaha Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Usaha Anda yang sebelumnya')->with('warna', 'alert-danger');
            }
        } else {
            auth()->user()->sku()->create($data);
            return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Usaha berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
        }
    }


    public function destroy($id)
    {
        $sku = Sku::where('id', $id);
        $sku->delete();
        return redirect()->back();
    }
}
