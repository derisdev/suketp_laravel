<?php

namespace App\Http\Controllers\Super;

use App\Kades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kades $kades)
    {
        $kades = $kades->get();
        $kades_aktif = Kades::get()->where('status', 1)->first();
        return view('super.kades.index', compact(['kades', 'kades_aktif']));
    }

    public function aktifkan($id)
    {
        $kades = Kades::find($id);
        $kades_aktif = Kades::where('status', 1);
        if (isset($kades_aktif)) {
            $kades_aktif->update([
                'status' => 0,
            ]);
            $kades->update([
                'status' => 1,
            ]);
            return redirect(route('kades.index'))->with('status', 'Kades aktif telah diubah, mohon lengkapi foto ttd kades jika belum!')->with('warna', 'alert-success');
        } else {
            $kades->update([
                'status' => 1,
            ]);
            return redirect(route('kades.index'))->with('status', 'Kades aktif telah diubah, mohon lengkapi foto ttd kades jika belum!')->with('warna', 'alert-success');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required', 'nik' => 'required', 'ttl' => 'required', 'agama' => 'required', 'jk' => 'required', 'alamat' => 'required', 'jabatan' => 'required', 'periode' => 'required',
        ]);
        Kades::create($data);
        return redirect(route('kades.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kades = Kades::find($id);
        return view('super.kades.edit', compact('kades'));
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
        $kades = Kades::find($id);
        $data = $request->validate([
            'nama' => 'required', 'nik' => 'required', 'ttl' => 'required', 'agama' => 'required', 'jk' => 'required', 'alamat' => 'required', 'jabatan' => 'required', 'periode' => 'required',
        ]);
        $kades->update($data);
        return redirect(route('kades.index'));
    }

    public function foto(Request $request, $id)
    {
        $kades = Kades::find($id);
        $request->validate([
            'fotokades' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            'ttdcap' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);
        // foto kades
        if ($request->hasFile('fotokades')) {
            // biar foto default yang dikasih nama kades.jpg gak kehapus kalau ada yang mau update pas pertama kali
            if ($kades->fotokades == 'kades.jpg') {
                $extfotokades = $request->file('fotokades')->extension();
                $fotokadesname = date('dmyHis') . '.' . $extfotokades;
                Storage::putFileAs('public/fotokades', $request->file('fotokades'), $fotokadesname);
            } else {
                Storage::delete('/public/fotokades/' . $kades->fotokades);
                $extfotokades = $request->file('fotokades')->extension();
                $fotokadesname = date('dmyHis') . '.' . $extfotokades;
                Storage::putFileAs('public/fotokades', $request->file('fotokades'), $fotokadesname);
            }
        } else {
            $fotokadesname = $kades->fotokades;
        }
        // ttd cap
        if ($request->hasFile('ttdcap')) {
            if ($kades->ttdcap) {
                Storage::delete('/public/ttdcap/' . $kades->ttdcap);
                $extttdcap = $request->file('ttdcap')->extension();
                $ttdcapname = date('dmyHis') . '.' . $extttdcap;
                Storage::putFileAs('public/ttdcap', $request->file('ttdcap'), $ttdcapname);
            } else {
                $extttdcap = $request->file('ttdcap')->extension();
                $ttdcapname = date('dmyHis') . '.' . $extttdcap;
                Storage::putFileAs('public/ttdcap', $request->file('ttdcap'), $ttdcapname);
            }
        } else {
            $ttdcapname = $kades->ttdcap;
        }

        $kades->update([
            'fotokades' => $fotokadesname,
            'ttdcap' => $ttdcapname,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kades = Kades::find($id);
        $kades->delete();
        return redirect(route('kades.index'));
    }
}
