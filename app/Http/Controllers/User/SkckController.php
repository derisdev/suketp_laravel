<?php

namespace App\Http\Controllers\User;

use App\Skck;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkckController extends Controller
{

    public function create()
    {
        return view('form-ajuan.skck');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
            'klarifikasi' => 'required',
        ]);
        $cek = auth()->user()->skck()->where('jenis', 'SKCK')->get();
        if ($cek->count() != 0) {
            if (auth()->user()->skck()->where('jenis', 'SKCK')->where('acc', 0)->doesntExist()) {
                auth()->user()->skck()->create($data);
                return redirect(route('suratsaya'))->with('status', 'SKCK berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            } else {
                return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan SKCK lagi. Tunggu sampai SKCK Anda yang sebelumnya disetujui oleh Admin Desa. Atau batalkan pengajuan SKCK Anda yang sebelumnya')->with('warna', 'alert-danger');
            }
        } else {
            auth()->user()->skck()->create($data);
            return redirect(route('suratsaya'))->with('status', 'SKCK berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
        }
    }

    public function destroy($id)
    {
        $skck = Skck::where('id', $id);
        $skck->delete();
        return redirect()->back();
    }
}
