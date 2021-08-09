<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Sku;
use App\User;
use Illuminate\Http\Request;

class SkuController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    // public function create()
    // {
    //     return view('form-ajuan.sku');
    // }


    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
        ]);
        $user = auth('api')->user(); 
        $cek = $user->sku()->get();
        $sku = $user->sku();
        if ($cek->count() != 0) {
            if ($sku->where('acc', 0)->doesntExist()) {
                $sku->create($data);
                $response = [
                    'message' => 'SKU berhasil diajukan',
                ];
                 return response()->json($response, 200);
            } else {
                return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Usaha lagi. Tunggu sampai Surat Keterangan Usaha Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Usaha Anda yang sebelumnya'], 404);
            }
        } else {
            $sku->create($data);

            $response = [
                'message' => 'SKU Berhasil diajukan',
            ];
    
             return response()->json($response, 200);
        }
    }


    public function destroy($id)
    {
        $sku = Sku::findOrFail($id);

        if(!$sku->delete()){
            return response()->json([
                'message' => 'Gagal Menghapus Sku'
            ], 404);
        }

        $response = [
            'message' => 'Sku Berhasil dihapus',
        ];

        return response()->json($response, 200);
    }
}
