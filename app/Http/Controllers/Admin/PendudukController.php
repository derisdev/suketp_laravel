<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
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

        $user->update($data);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->ajuans()->delete();
        Storage::delete('/public/fotoktp/' . $user->fotoktp);
        Storage::delete('/public/fotokk/' . $user->fotokk);
        $user->delete();
        return redirect(route('user.index'));
    }

    // public function nonAktifkan($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->update([
    //         'status_user' => 0,
    //     ]);
    //     return 
    // }
}
