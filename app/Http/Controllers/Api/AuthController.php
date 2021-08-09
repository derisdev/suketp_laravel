<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['store', 'signin']]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required'],
            'nik' => ['required', 'unique:users'],
            'no_kk' => ['required'],
            'ttl' => ['required'],
            'agama' => ['required'],
            'jk' => ['required'],
            'status' => ['required'],
            'ayah' => ['required'],
            'ibu' => ['required'],
            'pendidikan' => ['required'],
            'pekerjaan' => ['required'],
            'rt' => ['required'],
            'rw' => ['required'],
            'alamat' => ['required'],
            'kewarganegaraan' => ['required'],
            'password' => ['required'],
        ]);

        $nama = $request->input('nama');
        $nik = $request->input('nik');
        $no_kk = $request->input('no_kk');
        $ttl = $request->input('ttl');
        $agama = $request->input('agama');
        $jk = $request->input('jk');
        $status = $request->input('status');
        $ayah = $request->input('ayah');
        $ibu = $request->input('ibu');
        $pendidikan = $request->input('pendidikan');
        $pekerjaan = $request->input('pekerjaan');
        $rt = $request->input('rt');
        $password = $request->input('password');
        $rw = $request->input('rw');
        $password = $request->input('password');
        $alamat = $request->input('alamat');
        $kewarganegaraan = $request->input('kewarganegaraan');
        $password = $request->input('password');

        $user = new User([
            'nama' => $nama,
            'nik' => $nik,
            'no_kk' => $no_kk,
            'ttl' => $ttl,
            'agama' => $agama,
            'jk' => $jk,
            'status' => $status,
            'ayah' => $ayah,
            'ibu' => $ibu,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'rt' => $rt,
            'rw' => $rw,
            'alamat' => $alamat,
            'kewarganegaraan' => $kewarganegaraan,
            'password' => Hash::make($password),
        ]);

        if ($user->save()) {

           
            $user->signin = [
                'href' => 'api/v1/user/login',
                'method' => 'POST',
                'params' => 'nik, password'
            ];
            $response = [
                'message' => 'User created',
                'user' => $user,
            ];
            if ($token = auth('api')->attempt(['nik' => $nik, 'password' => $password])) {
                return $this->createNewToken($token);
            }
            return response()->json(['message' => 'User atau Password Salah'], 404);
        }

        $response = [
            'message' => 'An error occurred'
        ];

        return response()->json($response, 404);

    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'password' => 'required|min:5'
        ]);

        $nik = $request->input('nik');
        $password = $request->input('password');

        if ($token = auth('api')->attempt(['nik' => $nik, 'password' => $password])) {
            return $this->createNewToken($token);
        }
        
        return response()->json(['message' => 'User atau Password Salah'], 404);



    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 1000000000000000000,
            'user' => auth('api')->user()
        ]);
    }

    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }
}