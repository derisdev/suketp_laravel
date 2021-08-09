<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    
    public function __construct() {
        $this->middleware('auth:api');
    }
    // public function editProfil()
    // {
    //     $user = auth()->user();
    //     return view('user.edit-profil', compact('user'));
    // }

    public function userdetail(){
        $user = auth('api')->user(); 

        $response = [
            'message' => 'User Detail',
            'user' => $user
        ];

        return response()->json($response, 200);

    }


    public function update(Request $request)
    {

        $user = auth('api')->user(); 
        $data = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'status' => 'required',
            'pekerjaan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'alamat' => 'required',
            'kewarganegaraan' => 'required',
        ]);

        if(!$user->update($data)){
            return response()->json([
                'message' => 'Error during update'
            ], 404);
        }

        $response = [
            'message' => 'User Updated',
            'user' => $user
        ];

        return response()->json($response, 200);
    }

    public function gantiPassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required',
        ]);

        $user = auth('api')->user(); 
        
        if (Hash::check($request->password, $user->password)) { 
            $user->fill([
             'password' => Hash::make($request->new_password)
             ])->save();
         
             $response = [
                'message' => 'Password Updated',
            ];
    
             return response()->json($response, 200);
         
         } else {
             
            $response = [
                'message' => 'Update gagal',
            ];
    
             return response()->json($response, 404);
         }
    }

    // public function lengkapiProfil()
    // {
    //     $user = auth()->user();
    //     if ($user->status_lengkap) {
    //         // alihkan ke halaman anda error redirect yang nampilin data kelengkapan dan tombol ke edit lengkapi profil (method yang bawah)
    //     }
    //     return view('user.lengkapi-profil', compact('user'));
    // }

    public function storeLengkapi(Request $request)
    {
        $user = auth('api')->user(); 

        if ($user->status_lengkap == 1) {
            $data = $request->validate([
                'penghasilan' => 'required',
                'telp' => 'required',
                'fotoktp' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
                'fotokk' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            ]);
            if ($request->hasFile('fotoktp')) {
                $currentFotoKTP = 'fotoktp/'.$user->fotoktp;
                if(File::exists($currentFotoKTP)){
                 File::delete($currentFotoKTP);
                }
                $fileKTP =  $request->file('fotoktp');
                $destinationPath = 'fotoktp/';
                $filename= date('dmyHis') . '.' . $fileKTP->extension();
                $fileKTP->move($destinationPath, $filename);
                $request->fotoktp = $filename;
            }
            if ($request->hasFile('fotokk')) {
                $currentFotoKK = 'fotokk/' . $user->fotokk;
                if(File::exists($currentFotoKK)){
                 File::delete($currentFotoKK);
                }
                $fileKK =  $request->file('fotokk');
                $destinationPath = 'fotokk/';
                $filename= date('dmyHis') . '.' . $fileKK->extension();
                $fileKK->move($destinationPath, $filename);
                $request->fotokk = $filename;
            }
            if (!$request->hasFile('fotoktp')) {
                $request->fotoktp = $user->fotoktp;
            }
            if (!$request->hasFile('fotokk')) {
                $request->fotokk = $user->fotokk;
            }

            // lengkapi pake update ga pake insert
            $user->update([
                'penghasilan' => $data['penghasilan'],
                'telp' => $data['telp'],
                'fotoktp' =>  $request->fotoktp,
                'fotokk' =>  $request->fotokk
            ]);
        } else if ($user->status_lengkap == 0) {
            // validasi
            $data = $request->validate([
                'penghasilan' => 'required',
                'telp' => 'required',
                'fotoktp' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
                'fotokk' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]);
            $data['status_lengkap'] = 1;

            // store image ke storage
            $fileKTP =  $request->file('fotoktp');
            $destinationPathKTP = 'fotoktp/';
            $filenameKTP= date('dmyHis') . '.' . $fileKTP->extension();
            $fileKTP->move($destinationPathKTP, $filenameKTP);

            $fileKK =  $request->file('fotokk');
            $destinationPathKK = 'fotokk/';
            $filenameKK= date('dmyHis') . '.' . $fileKK->extension();
            $fileKK->move($destinationPathKK, $filenameKK);

            // lengkapi pake update ga pake insert
            $user->update([
                'penghasilan' => $data['penghasilan'],
                'telp' => $data['telp'],
                'fotoktp' => $filenameKTP,
                'fotokk' =>  $filenameKK,
                'status_lengkap' => $data['status_lengkap'],
            ]);

            // nambahin permission lengkap ke user
            // $user->givePermissionTo('lengkap');
        }

        $response = [
            'message' => 'Berhasil melengkapi profil',
            'user' => $user
        ];

         return response()->json($response, 200);
    }

}
