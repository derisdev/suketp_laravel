<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function editProfil()
    {
        $user = auth()->user();
        return view('user.edit-profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'status' => 'required',
            'pekerjaan' => 'required',
            'rt_rw' => 'required',
            'alamat' => 'required',
            'kewarganegaraan' => 'required',
        ]);

        // edit profil user
        $user->update($data);
        return redirect('home');
    }

    public function gantiPassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => 'required',
        ]);

        if (!(Hash::check($request->passwordlama, $user->password))) {
            // $data = bcrypt($request->passwordbaru);
            // // edit profil user
            // $user->update($data);
            // return redirect(route('edit.profil'));
            return redirect(route('home'));
        } else {
            // echo "salah";
            return redirect(route('lengkapi.profil'));
        }
    }

    public function lengkapiProfil()
    {
        $user = auth()->user();
        if ($user->status_lengkap) {
            // alihkan ke halaman anda error redirect yang nampilin data kelengkapan dan tombol ke edit lengkapi profil (method yang bawah)
        }
        return view('user.lengkapi-profil', compact('user'));
    }

    public function storeLengkapi(Request $request)
    {
        // nangkep user
        $id = Auth::user()->id;
        $user = User::find($id);

        if ($user->status_lengkap == 1) {
            $data = $request->validate([
                'penghasilan' => 'required',
                'telp' => 'required',
                'fotoktp' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
                'fotokk' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            ]);
            if ($request->hasFile('fotoktp')) {
                Storage::delete('/public/fotoktp/' . $user->fotoktp);
                $extktp = $request->file('fotoktp')->extension();
                $request->fotoktp = date('dmyHis') . '.' . $extktp;
                Storage::putFileAs('public/fotoktp', $request->file('fotoktp'), $request->fotoktp);
            }
            if ($request->hasFile('fotokk')) {
                Storage::delete('/public/fotokk/' . $user->fotokk);
                $extkk = $request->file('fotokk')->extension();
                $request->fotokk = date('dmyHis') . '.' . $extkk;
                Storage::putFileAs('public/fotokk', $request->file('fotokk'), $request->fotokk);
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
                'fotoktp' => $request->fotoktp,
                'fotokk' => $request->fotokk,
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
            $extktp = $request->file('fotoktp')->extension();
            $extkk = $request->file('fotokk')->extension();
            $ktpname = date('dmyHis') . '.' . $extktp;
            $kkname = date('dmyHis') . '.' . $extkk;
            Storage::putFileAs('public/fotoktp', $request->file('fotoktp'), $ktpname);
            Storage::putFileAs('public/fotokk', $request->file('fotokk'), $kkname);

            // lengkapi pake update ga pake insert
            $user->update([
                'penghasilan' => $data['penghasilan'],
                'telp' => $data['telp'],
                'fotoktp' => $ktpname,
                'fotokk' => $kkname,
                'status_lengkap' => $data['status_lengkap'],
            ]);

            // nambahin permission lengkap ke user
            $user->givePermissionTo('lengkap');
        }

        return redirect('sktm');
    }
}
