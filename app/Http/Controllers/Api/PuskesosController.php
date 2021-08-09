<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Puskesos;
use App\User;
use Illuminate\Http\Request;

class PuskesosController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    // public function create()
    // {
    //     return view('form-ajuan.puskesos');
    // }


    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);

        $user = auth('api')->user(); 
        $cek = $user->puskesos()->where('jenis', 'Surat Keterangan PUSKESOS')->get();
        $puskesos = $user->puskesos();
        if ($cek->count() != 0) {
            if ($puskesos->where('jenis', 'Surat Keterangan PUSKESOS')->where('acc', 0)->doesntExist()) {
                $puskesos->create($data);

                $response = [
                    'message' => 'Puskesos berhasil diajukan',
                ];
                 return response()->json($response, 200);
            } else {
                return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan PUSKESOS lagi. Tunggu sampai Surat Keterangan PUSKESOS Anda yang sebelumnya disetujui oleh Admin Desa. Atau batalkan pengajuan Surat Keterangan PUSKESOS Anda yang sebelumnya'], 404);
            }
        } else {
            $puskesos->create($data);

            $response = [
                'message' => 'Puskesos berhasil diajukan',
            ];
             return response()->json($response, 200);
        }
    }

    public function destroy($id)
    {

        $puskesos = Puskesos::findOrFail($id);

        if(!$puskesos->delete()){
            return response()->json([
                'message' => 'Gagal Menghapus puskesos'
            ], 404);
        }

        $response = [
            'message' => 'Puskesos Berhasil dihapus',
        ];

        return response()->json($response, 200);
    }
}
