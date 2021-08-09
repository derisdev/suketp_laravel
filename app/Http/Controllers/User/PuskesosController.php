<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Puskesos;
use Illuminate\Http\Request;

class PuskesosController extends Controller
{

    public function create()
    {
        return view('form-ajuan.puskesos');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);
        $cek = auth()->user()->puskesos()->where('jenis', 'Surat Keterangan PUSKESOS')->get();
        if ($cek->count() != 0) {
            if (auth()->user()->puskesos()->where('jenis', 'Surat Keterangan PUSKESOS')->where('acc', 0)->doesntExist()) {
                auth()->user()->puskesos()->create($data);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan PUSKESOS berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            } else {
                return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan PUSKESOS lagi. Tunggu sampai Surat Keterangan PUSKESOS Anda yang sebelumnya disetujui oleh Admin Desa. Atau batalkan pengajuan Surat Keterangan PUSKESOS Anda yang sebelumnya')->with('warna', 'alert-danger');
            }
        } else {
            auth()->user()->puskesos()->create($data);
            return redirect(route('suratsaya'))->with('status', 'Surat Keterangan PUSKESOS berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
        }
    }

    public function destroy($id)
    {
        $puskesos = Puskesos::where('id', $id);
        $puskesos->delete();
        return redirect()->back();
    }
}
