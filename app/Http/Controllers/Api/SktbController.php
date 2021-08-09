<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Sktb;
use App\User;
use Illuminate\Http\Request;

class SktbController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }
    // public function create()
    // {
    //     return view('form-ajuan.sktb');
    // }

    // public function create2()
    // {
    //     return view('form-ajuan.sktb2');
    // }

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

      
        
        // $newSKTB = new Sktb([
        //     'keterangan' => $data['keterangan'],
        //     'jenis' => $data['jenis'],
        //     'pemilik' => $data['pemilik'],
        //     'memiliki' => $data['memiliki'],
        //     'luas' => $data['luas'],
        //     'luas_persegi' => $data['luas_persegi'],
        //     'lokasi' => $data['lokasi'],
        //     'harga' => $data['harga'],
        //     'harga_terbilang' => $data['harga_terbilang'],
        //     'total_harga' => $data['total_harga'],
        //     'total_harga_tanah' => $data['total_harga_tanah'],
        //     'akta' => $data['akta'],
        //     'no_akta' => $data['no_akta'],
        //     'blok' => $data['blok'],
        //     'no_personil' => $data['no_personil'],
        //     'no_kohir' => $data['no_kohir'],
        //     'utara' => $data['utara'],
        //     'barat' => $data['barat'],
        //     'selatan' => $data['selatan'],
        //     'timur' => $data['timur'],
        //     'nominal_bangunan' => $data['nominal_bangunan'],
        //     'terbilang_bangunan' => $data['terbilang_bangunan'],
        //     'user_id' => $user_id,

        // ]);

        $user = auth('api')->user(); 
        $cek = $user->sktb()->where('jenis', 'Surat Keterangan Tanah Bangunan')->get();
        $sktb = $user->sktb()->where('jenis', 'Surat Keterangan Tanah Bangunan');


        if ($cek->count() != 0) {
            if ($sktb->where('acc', 0)->doesntExist()) {
                $sktb->create($data);
                $response = [
                    'message' => 'Berhasil diajukan',
                ];
                 return response()->json($response, 200);
            } else {
                return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Tanah Bangunan lagi. Tunggu sampai Surat Keterangan Tanah Bangunan Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Tanah Bangunan Anda yang sebelumnya'], 404);
            }
        } else {
            $sktb->create($data);
            $response = [
                'message' => 'Berhasil diajukan',
            ];
    
             return response()->json($response, 200);
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

        $user = auth('api')->user(); 
        $cek = $user->sktb()->where('jenis', 'Surat Keterangan Tanah Bangunan 2')->get();
        $sktb = $user->sktb()->where('jenis', 'Surat Keterangan Tanah Bangunan 2');
       if ($cek->count() != 0) {
            if ($sktb->where('acc', 0)->doesntExist()) {
                $sktb->create($data);
                $response = [
                    'message' => 'Sktb Berhasil diajukan',
                ];
                 return response()->json($response, 200);
            } else {
                return response()->json(['message' => 'Anda belum bisa mengajukan Surat Keterangan Tanah Bangunan lagi. Tunggu sampai Surat Keterangan Tanah Bangunan Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Tanah Bangunan Anda yang sebelumnya'], 404);
            }
        } else {
            $sktb->create($data);
            $response = [
                'message' => 'Berhasil diajukan',
            ];
    
             return response()->json($response, 200);
        }
    }


    public function destroy($id)
    {
        $sktb = Sktb::findOrFail($id);

        if(!$sktb->delete()){
            return response()->json([
                'message' => 'Gagal Menghapus Sktb'
            ], 404);
        }

        $response = [
            'message' => 'Sktb Berhasil dihapus',
        ];

        return response()->json($response, 200);
    }
}
