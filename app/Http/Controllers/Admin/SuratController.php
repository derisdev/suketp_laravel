<?php

namespace App\Http\Controllers\Admin;

use App\Keperluan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PesanPenolakan;

class SuratController extends Controller
{
    public function index()
    {
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();

        return view('admin.surat.index', [
            'keperluan' => $keperluan,
            'pesan_penolakan' => $pesan_penolakan,
        ]);
    }
}
