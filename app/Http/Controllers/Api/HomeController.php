<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Ajuan;
use App\Puskesos;
use App\Sktb;
use App\Sku;
use App\Sktm;
use App\Skck;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $ajuans = Ajuan::all();
        return response()->json($ajuans, 200);
    }

    // SHOW
    public function suratSaya()
    {

        $user_id = auth('api')->user()->id; 
        // surat harian
        $ajuans = Ajuan::where('user_id', $user_id)->get();

        // puskesos
        $puskesoss = Puskesos::where('user_id', $user_id)->get();
        // skkd / sktb
        $sktbs = Sktb::where('user_id', $user_id)->get();
        // sku
        $skus = Sku::where('user_id', $user_id)->get();
        // sktm
        $sktms = Sktm::where('user_id', $user_id)->get();
        // skck
        $skcks = Skck::where('user_id', $user_id)->get();

        $data = [
            "ajuans" => $ajuans,
            "puskesoss" => $puskesoss,
            "sktbs" => $sktbs,
            "skus" => $skus,
            "sktms" => $sktms,
            "skcks" => $skcks,
        ];

        $response = [
            'message' => 'Data kosong',
            'data' => []
        ];

        if (
            count($ajuans) == 0 && count($puskesoss) == 0 && count($sktbs) == 0 && count($skus) == 0 &&
            count($sktms) == 0 && count($skcks) == 0
        ) {
            return response()->json($response, 200);
        }


        $response = [
            'message' => 'Success get data',
            'data' => $data
        ];



        return response()->json($response, 200);
    }

    public function diterima()
    {
        $user_id = auth('api')->user()->id; 

        $ajuans = Ajuan::where('user_id', $user_id)->get();
        $puskesoss = Puskesos::where('user_id', $user_id)->get();
        $sktbs = Sktb::where('user_id', $user_id)->get();
        $skus = Sku::where('user_id', $user_id)->get();
        $sktms = Sktm::where('user_id', $user_id)->get();
        $skcks = Skck::where('user_id', $user_id)->get();

        $adaterima = $ajuans->where('acc', 1);
        $puskesosterima = $puskesoss->where('acc', 1);
        $sktbterima = $sktbs->where('acc', 1);
        $skuterima = $skus->where('acc', 1);
        $sktmterima = $sktms->where('acc', 1);
        $skckterima = $skcks->where('acc', 1);

        $response = [
            'message' => 'Data kosong',
            'data' => []
        ];


        if (
            count($adaterima) == 0 && count($puskesosterima) == 0 && count($sktbterima) == 0 && count($skuterima) == 0 &&
            count($sktmterima) == 0 && count($skckterima) == 0
        ) {
            return response()->json($response, 200);
        }

        $data = [
            "ajuans" => $adaterima,
            "puskesoss" => $puskesosterima,
            "sktbs" => $sktbterima,
            "skus" => $skuterima,
            "sktms" => $sktmterima,
            "skcks" => $skckterima,
        ];
        $response = [
            'message' => 'Success get data',
            'data' => $data
        ];

        return response()->json($response, 200);
    }

    public function ditolak()
    {

        $user_id = auth('api')->user()->id; 
        $ajuans = Ajuan::where('user_id', $user_id)->get();
        $puskesoss = Puskesos::where('user_id', $user_id)->get();
        $sktbs = Sktb::where('user_id', $user_id)->get();
        $skus = Sku::where('user_id', $user_id)->get();
        $sktms = Sktm::where('user_id', $user_id)->get();
        $skcks = Skck::where('user_id', $user_id)->get();

        $adatolak = $ajuans->where('acc', 2);
        $puskesostolak = $puskesoss->where('acc', 2);
        $sktbtolak = $sktbs->where('acc', 2);
        $skutolak = $skus->where('acc', 2);
        $sktmtolak = $sktms->where('acc', 2);
        $skcktolak = $skcks->where('acc', 2);
        
        
        $response = [
            'message' => 'Data kosong',
            'data' => []
        ];


        if (
            count($adatolak) == 0 && count($puskesostolak) == 0 && count($sktbtolak) == 0 && count($skutolak) == 0 &&
            count($sktmtolak) == 0 && count($skcktolak) == 0
        ) {
            return response()->json($response, 200);
        }

        $data = [
            "ajuans" => $adatolak,
            "puskesoss" => $puskesostolak,
            "sktbs" => $sktbtolak,
            "skus" => $skutolak,
            "sktms" => $sktmtolak,
            "skcks" => $skcktolak,
        ];
        $response = [
            'message' => 'Success get data',
            'data' => $data
        ];

        return response()->json($response, 200);
    }
    public function menunggu()
    {
        $user_id = auth('api')->user()->id; 
        $ajuans = Ajuan::where('user_id', $user_id)->get();
        $puskesoss = Puskesos::where('user_id', $user_id)->get();
        $sktbs = Sktb::where('user_id', $user_id)->get();
        $skus = Sku::where('user_id', $user_id)->get();
        $sktms = Sktm::where('user_id', $user_id)->get();
        $skcks = Skck::where('user_id', $user_id)->get();

        $adabelum = $ajuans->where('acc', 0);
        $puskesosbelum = $puskesoss->where('acc', 0);
        $sktbbelum = $sktbs->where('acc', 0);
        $skubelum = $skus->where('acc', 0);
        $sktmbelum = $sktms->where('acc', 0);
        $skckbelum = $skcks->where('acc', 0);
        
        $response = [
            'message' => 'Data kosong',
            'data' => []
        ];


        if (
            count($adabelum) == 0 && count($puskesosbelum) == 0 && count($sktbbelum) == 0 && count($skubelum) == 0 &&
            count($sktmbelum) == 0 && count($skckbelum) == 0
        ) {
            return response()->json($response, 200);
        }

        $data = [
            "ajuans" => $adabelum,
            "puskesoss" => $puskesosbelum,
            "sktbs" => $sktbbelum,
            "skus" => $skubelum,
            "sktms" => $sktmbelum,
            "skcks" => $skckbelum,
        ];
        $response = [
            'message' => 'Success get data',
            'data' => $data
        ];

        return response()->json($response, 200);
    }
}
