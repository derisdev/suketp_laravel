<?php

namespace App\Http\Controllers\Api;

use App\Skck;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkckController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

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

        $user = auth('api')->user(); 
        $cek = $user->skck()->where('jenis', 'SKCK')->get();
        $skck = $user->skck()->where('jenis', 'SKCK');

        if ($cek->count() != 0) {
            if ($skck->where('acc', 0)->doesntExist()) {
                $user->skck()->create($data);
                $response = [
                    'message' => 'SKCK berhasil diajukan',
                ];
                 return response()->json($response, 200);
            } else {
                return response()->json(['message' => 'Anda belum bisa mengajukan SKCK lagi. Tunggu sampai SKCK Anda yang sebelumnya disetujui oleh Admin Desa. Atau batalkan pengajuan SKCK Anda yang sebelumnya'], 404);
            }
        } else {
            $user->skck()->create($data);
            $response = [
                'message' => 'SKCK berhasil diajukan',
            ];
             return response()->json($response, 200);
        }
    }

    public function destroy($id)
    {

        $skck = Skck::findOrFail($id);

        if(!$skck->delete()){
            return response()->json([
                'message' => 'Gagal Menghapus Skck'
            ], 404);
        }

        $response = [
            'message' => 'Skck Berhasil dihapus',
        ];

        return response()->json($response, 200);
    }
}
