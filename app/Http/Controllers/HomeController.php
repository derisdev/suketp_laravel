<?php

namespace App\Http\Controllers;

use App\Ajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // $surat = Ajuan::all('jenis');
        $ajuans = auth()->user()->ajuans()->get();
        return view('home', compact('ajuans'));
    }

    // SHOW
    public function suratSaya()
    {
        // surat harian
        $ajuans = auth()->user()->ajuans()->get();
        $adatolak = $ajuans->where('acc', 2);
        $adaterima = $ajuans->where('acc', 1);
        $adabelum = $ajuans->where('acc', 0);

        // puskesos
        $puskesoss = auth()->user()->puskesos()->get();
        $puskesostolak = $puskesoss->where('acc', 2);
        $puskesosterima = $puskesoss->where('acc', 1);
        $puskesosbelum = $puskesoss->where('acc', 0);
        // skkd / sktb
        $sktbs = auth()->user()->sktb()->get();
        $sktbtolak = $sktbs->where('acc', 2);
        $sktbterima = $sktbs->where('acc', 1);
        $sktbbelum = $sktbs->where('acc', 0);
        // sku
        $skus = auth()->user()->sku()->get();
        $skutolak = $skus->where('acc', 2);
        $skuterima = $skus->where('acc', 1);
        $skubelum = $skus->where('acc', 0);
        // sktm
        $sktms = auth()->user()->sktm()->get();
        $sktmtolak = $sktms->where('acc', 2);
        $sktmterima = $sktms->where('acc', 1);
        $sktmbelum = $sktms->where('acc', 0);
        // skck
        $skcks = auth()->user()->skck()->get();
        $skcktolak = $skcks->where('acc', 2);
        $skckterima = $skcks->where('acc', 1);
        $skckbelum = $skcks->where('acc', 0);
        // kelahiran
        $kelahirans = auth()->user()->kelahiran()->get();
        $kelahirantolak = $kelahirans->where('acc', 2);
        $kelahiranterima = $kelahirans->where('acc', 1);
        $kelahiranbelum = $kelahirans->where('acc', 0);
        return view('user.surat-saya', compact([
            'ajuans',
            'adatolak',
            'adaterima',
            'adabelum',
            'sktbs',
            'sktbtolak',
            'sktbterima',
            'sktbbelum',
            'skus',
            'skutolak',
            'skuterima',
            'skubelum',
            'sktms',
            'sktmtolak',
            'sktmterima',
            'sktmbelum',
            'skcks',
            'skcktolak',
            'skckterima',
            'skckbelum',
            'puskesoss',
            'puskesostolak',
            'puskesosterima',
            'puskesosbelum',
            'kelahirans',
            'kelahirantolak',
            'kelahiranterima',
            'kelahiranbelum',
        ]));
    }

    public function diterima()
    {
        $ajuans = auth()->user()->ajuans()->get();
        $puskesoss = auth()->user()->puskesos()->get();
        $sktbs = auth()->user()->sktb()->get();
        $skus = auth()->user()->sku()->get();
        $sktms = auth()->user()->sktm()->get();
        $skcks = auth()->user()->skck()->get();
        $kelahirans = auth()->user()->kelahiran()->get();

        $adaterima = $ajuans->where('acc', 1);
        $puskesosterima = $puskesoss->where('acc', 1);
        $sktbterima = $sktbs->where('acc', 1);
        $skuterima = $skus->where('acc', 1);
        $sktmterima = $sktms->where('acc', 1);
        $skckterima = $skcks->where('acc', 1);
        $kelahiranterima = $skcks->where('acc', 1);
        return view('user.navbar-surat.diterima', compact([
            'ajuans',
            'adaterima',
            'sktbs',
            'sktbterima',
            'skus',
            'skuterima',
            'sktms',
            'sktmterima',
            'skcks',
            'skckterima',
            'puskesoss',
            'puskesosterima',
            'kelahirans',
            'kelahiranterima',
        ]));
    }

    public function ditolak()
    {
        $ajuans = auth()->user()->ajuans()->get();
        $puskesoss = auth()->user()->puskesos()->get();
        $sktbs = auth()->user()->sktb()->get();
        $skus = auth()->user()->sku()->get();
        $sktms = auth()->user()->sktm()->get();
        $skcks = auth()->user()->skck()->get();
        $kelahirans = auth()->user()->kelahiran()->get();

        $adatolak = $ajuans->where('acc', 2);
        $puskesostolak = $puskesoss->where('acc', 2);
        $sktbtolak = $sktbs->where('acc', 2);
        $skutolak = $skus->where('acc', 2);
        $sktmtolak = $sktms->where('acc', 2);
        $skcktolak = $skcks->where('acc', 2);
        $kelahirantolak = $kelahirans->where('acc', 2);
        return view('user.navbar-surat.ditolak', compact([
            'ajuans',
            'adatolak',
            'sktbs',
            'sktbtolak',
            'skus',
            'skutolak',
            'sktms',
            'sktmtolak',
            'skcks',
            'skcktolak',
            'puskesoss',
            'puskesostolak',
            'kelahirans',
            'kelahirantolak',
        ]));
    }
    public function menunggu()
    {
        $ajuans = auth()->user()->ajuans()->get();
        $puskesoss = auth()->user()->puskesos()->get();
        $sktbs = auth()->user()->sktb()->get();
        $skus = auth()->user()->sku()->get();
        $sktms = auth()->user()->sktm()->get();
        $skcks = auth()->user()->skck()->get();
        $kelahirans = auth()->user()->kelahiran()->get();

        $adabelum = $ajuans->where('acc', 0);
        $kelahiranbelum = $kelahirans->where('acc', 0);
        $puskesosbelum = $puskesoss->where('acc', 0);
        $sktbbelum = $sktbs->where('acc', 0);
        $skubelum = $skus->where('acc', 0);
        $sktmbelum = $sktms->where('acc', 0);
        $skckbelum = $skcks->where('acc', 0);
        return view('user.navbar-surat.menunggu', compact([
            'ajuans',
            'adabelum',
            'sktbs',
            'sktbbelum',
            'skus',
            'skubelum',
            'sktms',
            'sktmbelum',
            'skcks',
            'skckbelum',
            'puskesoss',
            'puskesosbelum',
            'kelahirans',
            'kelahiranbelum',
        ]));
    }
}
