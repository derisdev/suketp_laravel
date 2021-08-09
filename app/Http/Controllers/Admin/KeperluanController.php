<?php

namespace App\Http\Controllers\Admin;

use App\Keperluan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeperluanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $keperluan = Keperluan::get();
        // return view('admin.surat.index', compact('keperluan'));
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
            'keperluan' => 'required',
        ]);

        Keperluan::create($data);
        return redirect()->back();
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
        $keperluan = Keperluan::find($id);
        $data = $request->validate(['keperluan' => 'required']);
        $keperluan->update($data);
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
        $keperluan = Keperluan::where('id', $id);
        $keperluan->delete();
        return redirect()->back();
    }
}
