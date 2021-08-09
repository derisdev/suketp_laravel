<?php

namespace App\Http\Controllers\Admin;

use App\Ajuan;
use App\Kades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelahiran;
use App\Puskesos;
use App\Skck;
use App\Sktb;
use App\Sktm;
use App\Sku;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $antrian = Ajuan::where('acc', 0)->oldest()->paginate(5);
        $sktbs = Sktb::where('acc', 0)->oldest()->paginate(5);
        $sktms = Sktm::where('acc', 0)->oldest()->paginate(5);
        $skus = Sku::where('acc', 0)->oldest()->paginate(5);
        $skcks = Skck::where('acc', 0)->oldest()->paginate(5);
        $puskesoss = Puskesos::where('acc', 0)->oldest()->paginate(5);
        $kelahirans = Kelahiran::where('acc', 0)->oldest()->paginate(5);
        $kades = Kades::where('status', 1)->first();
        $users = User::get();
        return view('admin.dashboard.index', [
            'kades' => $kades,
            'users' => $users,
            'antrian' => $antrian,
            'sktbs' => $sktbs,
            'sktms' => $sktms,
            'skcks' => $skcks,
            'skus' => $skus,
            'puskesoss' => $puskesoss,
            'kelahirans' => $kelahirans,
        ]);
    }
}
