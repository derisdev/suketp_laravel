<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SktmController extends Controller
{
    public function create()
    {
        return view('form-ajuan.sktm');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
            'nama_anak' => 'required',
            'nik_anak' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jk_anak' => 'required',
            'sekolah' => 'required',
            'kelas' => 'required',
        ]);
        $cek = auth()->user()->sktm()->where('jenis', 'SKTM')->get();
        if ($cek->count() != 0) {
            if (auth()->user()->sktm()->where('jenis', 'SKTM')->where('acc', 0)->doesntExist()) {
                auth()->user()->sktm()->create($data);
                return redirect(route('suratsaya'))->with('status', 'SKTM berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            } else {
                return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan SKTM lagi. Tunggu sampai SKTM Anda yang sebelumnya disetujui oleh Admin Desa. Atau batalkan pengajuan SKTM Anda yang sebelumnya')->with('warna', 'alert-danger');
            }
        } else {
            auth()->user()->sktm()->create($data);
            return redirect(route('suratsaya'))->with('status', 'SKTM berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
        }
    }

    public function destroy($id)
    {
        $sktm = Sktm::where('id', $id);
        $sktm->delete();
        return redirect()->back();
    }
}
