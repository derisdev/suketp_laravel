<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Sktm;
use App\User;
use Illuminate\Http\Request;

class SktmController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }
    
    // public function create()
    // {
    //     return view('form-ajuan.sktm');
    // }

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

        $user = auth('api')->user(); 
        $cek = $user->sktm()->where('jenis', 'SKTM')->get();
        $sktm = $user->sktm()->where('jenis', 'SKTM');
        if ($cek->count() != 0) {
            if ($sktm->where('acc', 0)->doesntExist()) {
                $user->sktm()->create($data);
                $response = [
                    'message' => 'SKTM berhasil diajukan',
                ];
                 return response()->json($response, 200);
            } else {
                return response()->json(['message' => 'Anda belum bisa mengajukan SKTM lagi. Tunggu sampai SKTM Anda yang sebelumnya disetujui oleh Admin Desa. Atau batalkan pengajuan SKTM Anda yang sebelumnya'], 404);
            }
        } else {
            $user->sktm()->create($data);

            $response = [
                'message' => 'SKTM berhasil diajukan',
            ];
             return response()->json($response, 200);
        }
    }

    public function destroy($id)
    {
        $sktm = Sktm::findOrFail($id);

        if(!$sktm->delete()){
            return response()->json([
                'message' => 'Gagal Menghapus Sktm'
            ], 404);
        }

        $response = [
            'message' => 'sktm Berhasil dihapus',
        ];

        return response()->json($response, 200);
    }
}
