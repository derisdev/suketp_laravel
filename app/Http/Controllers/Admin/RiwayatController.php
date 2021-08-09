<?php

namespace App\Http\Controllers\Admin;

use App\Ajuan;
use App\Http\Controllers\Controller;
use App\Skck;
use App\Sktb;
use App\Sktm;
use App\Sku;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $sktbs = Sktb::whereIn('acc', [1, 2])->get();
        $sktms = Sktm::whereIn('acc', [1, 2])->get();
        $skcks = Skck::whereIn('acc', [1, 2])->get();
        $skus = Sku::whereIn('acc', [1, 2])->get();
        $riwayat = Ajuan::whereIn('acc', [1, 2])->get();
        return view('admin.riwayat.index', compact(['riwayat', 'sktbs', 'sktms', 'skcks', 'skus']));
    }
}
