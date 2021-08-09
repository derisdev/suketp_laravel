<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Kelahiran;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    public function create()
    {
        return view('form-ajuan.kelahiran');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'pukul' => 'required',
            'jk_anak' => 'required',
            'anak_ke' => 'required',
            'nama_anak' => 'required',
            'nama_ibu' => 'required',
            'umur_ibu' => 'required',
            'agama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',
            'nama_ayah' => 'required',
            'umur_ayah' => 'required',
            'agama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_ayah' => 'required',
        ]);
        $cek = auth()->user()->kelahiran()->get();
        if ($cek->count() != 0) {
            if (auth()->user()->kelahiran()->where('acc', 0)->doesntExist()) {
                auth()->user()->kelahiran()->create($data);
                return redirect(route('suratsaya'))->with('status', 'Surat Kelahiran berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            } else {
                return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Kelahiran lagi. Tunggu sampai Surat Kelahiran Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Kelahiran Anda yang sebelumnya')->with('warna', 'alert-danger');
            }
        } else {
            auth()->user()->kelahiran()->create($data);
            return redirect(route('suratsaya'))->with('status', 'Surat Kelahiran berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
        }
    }

    public function destroy($id)
    {
        $kelahiran = Kelahiran::where('id', $id);
        $kelahiran->delete();
        return redirect()->back();
    }
}
