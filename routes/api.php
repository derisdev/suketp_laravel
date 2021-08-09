<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\DownloadController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AjuanController;
use App\Http\Controllers\Api\SktbController;
use App\Http\Controllers\Api\SkuController;
use App\Http\Controllers\Api\SktmController;
use App\Http\Controllers\Api\SkckController;
use App\Http\Controllers\Api\PuskesosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => 'api','prefix' => 'v1'], function() {

    Route::post('/user/register',  [AuthController::class, 'store']);
    Route::post('/user/login',  [AuthController::class, 'signin']);
    
    Route::get('/home',  [HomeController::class, 'index']);
    // Surat Saya
    Route::get('/surat-saya', [HomeController::class, 'suratSaya']);
    Route::get('/surat-saya/diterima', [HomeController::class, 'diterima']);
    Route::get('/surat-saya/ditolak', [HomeController::class, 'ditolak']);
    Route::get('/surat-saya/menunggu', [HomeController::class, 'menunggu']);
    // Edit Profil
    Route::get('/edit-profil', [UserController::class, 'userdetail']);
    Route::post('/edit-profil', [UserController::class, 'update']);
    Route::post('/ganti-password', [UserController::class, 'gantiPassword']);
    // Lengkapi Profil
    Route::post('/lengkapi-profil', [UserController::class, 'storeLengkapi']);


    // CREATE: Form Ajuan
    // Route::get('/kebakaran', 'User\AjuanController@kebakaranForm')->name('kebakaran.create');
    // Route::get('/serbaguna', 'User\AjuanController@serbagunaForm')->name('serbaguna.create');
    // Route::get('/penghasilan', 'User\AjuanController@penghasilanForm')->name('penghasilan.create');
    // Route::get('/ktp-expire', 'User\AjuanController@ktpExpireForm')->name('ktpExpire.create');
    // Route::get('/kehilangan', 'User\AjuanController@kehilanganForm')->name('kehilangan.create');
    // Route::get('/sk', 'User\AjuanController@skForm')->name('sk.create');
    // Route::get('/sd', 'User\AjuanController@sdForm')->name('sd.create');
    // Route::get('/belum-menikah', 'User\AjuanController@belumMenikahForm')->name('belum-menikah.create');
    // Route::get('/janda-duda', 'User\AjuanController@jandaDudaForm')->name('janda-duda.create');
    // Route::get('/diluar-kota', 'User\AjuanController@diluarKotaForm')->name('diluar-kota.create');
    // Route::get('/kuasa', 'User\AjuanController@kuasaForm')->name('kuasa.create');
    // Route::get('/izin-ortu', 'User\AjuanController@izinOrtuForm')->name('izin-ortu.create');
    // Route::get('/tidak-kerja', 'User\AjuanController@tidakKerjaForm')->name('tidak-kerja.create');
    // Route::get('/ahli-waris', 'User\AjuanController@ahliWarisForm')->name('ahli-waris.create');
    // Route::get('/beda-nama', 'User\AjuanController@bedaNamaForm')->name('beda-nama.create');
    // Route::get('/izin-keramaian', 'User\AjuanController@izinKeramaianForm')->name('izin-keramaian.create');
    // Route::get('/penganut', 'User\AjuanController@penganutForm')->name('penganut.create');
    // Route::get('/batal-menganut', 'User\AjuanController@batalMenganutForm')->name('batal-menganut.create');
    // // // Form Ajuan Non-harian
    // Route::get('/sktb', 'User\SktbController@create')->name('sktb.create');
    // Route::get('/sktb2', 'User\SktbController@create2')->name('sktb2.create');
    // Route::get('/sku', 'User\SkuController@create')->name('sku.create');
    // Route::get('/skck', 'User\SkckController@create')->name('skck.create');
    // Route::get('/puskesos', 'User\PuskesosController@create')->name('puskesos.create');
    // // Route::get('/sktm', 'User\SktmController@create')->middleware('permission:lengkap')->name('sktm.create');
    // Route::get('/sktm', 'User\SktmController@create')->name('sktm.create');


    // STORE
    Route::post('/ajuan', [AjuanController::class, 'store']);
    // // Store Non-Harian
    Route::post('/sktb', [SktbController::class, 'store']);
    Route::post('/sktb2', [SktbController::class, 'store2']);
    Route::post('/sku', [SkuController::class, 'store']);
    Route::post('/sktm', [SktmController::class, 'store']);
    Route::post('/skck', [SkckController::class, 'store']);
    Route::post('/puskesos', [PuskesosController::class, 'store']);


    // SHOW: Lihat dan Download
    Route::get('/download/{ajuan:id}', 'Api\DownloadController@download')->name('download');
    Route::get('/suket/{ajuan:id}', 'Api\DownloadController@lihat')->name('lihat');
    Route::get('/download-sktb/{ajuan:id}', 'Api\DownloadController@sktbDownload')->name('sktb.download');
    Route::get('/suket-sktb/{ajuan:id}', 'Api\DownloadController@sktbLihat')->name('sktb.lihat');
    Route::get('/download-skkd/{ajuan:id}', 'Api\DownloadController@skkdDownload')->name('skkd.download');
    Route::get('/suket-skkd/{ajuan:id}', 'Api\DownloadController@skkdLihat')->name('skkd.lihat');
    Route::get('/download-sku/{ajuan:id}', 'Api\DownloadController@skuDownload')->name('sku.download');
    Route::get('/suket-sku/{ajuan:id}', 'Api\DownloadController@skuLihat')->name('sku.lihat');
    Route::get('/download-sktm/{ajuan:id}', 'Api\DownloadController@sktmDownload')->name('sktm.download');
    Route::get('/suket-sktm/{ajuan:id}', 'Api\DownloadController@sktmLihat')->name('sktm.lihat');
    Route::get('/download-skck/{ajuan:id}', 'Api\DownloadController@skckDownload')->name('skck.download');
    Route::get('/suket-skck/{ajuan:id}', 'Api\DownloadController@skckLihat')->name('skck.lihat');
    Route::get('/download-puskesos/{ajuan:id}', 'Api\DownloadController@puskesosDownload')->name('puskesos.download');
    Route::get('/suket-puskesos/{ajuan:id}', 'Api\DownloadController@puskesosLihat')->name('puskesos.lihat');
    // // download pernyataan dan tambahan
    Route::get('/domisili-pernyataan/{ajuan:id}', 'Api\DownloadController@domisiliPernyataan')->name('domisili.pernyataan');
    Route::get('/keramaian-pernyataan/{ajuan:id}', 'Api\DownloadController@keramaianPernyataan')->name('keramaian.pernyataan');
    Route::get('/penganut-kk/{ajuan:id}', 'Api\DownloadController@penganutKk')->name('penganut.kk');
    Route::get('/penganut-tanggung/{ajuan:id}', 'Api\DownloadController@penganutTanggung')->name('penganut.tanggung');
    Route::get('/skck-semi/{ajuan:id}', 'Api\DownloadController@skckSemi')->name('skck.semi');
    Route::get('/skck-lengkap/{ajuan:id}', 'Api\DownloadController@skckLengkap')->name('skck.lengkap');
    Route::get('/sktm-anak/{ajuan:id}', 'Api\DownloadController@sktmAnak')->name('sktm.anak');
    // // cetak pernyataan dan tambahan
    Route::get('/lihat-domisili-pernyataan/{ajuan:id}', 'Api\DownloadController@lihatDomisiliPernyataan')->name('lihat-domisili.pernyataan');
    Route::get('/lihat-keramaian-pernyataan/{ajuan:id}', 'Api\DownloadController@lihatKeramaianPernyataan')->name('lihat-keramaian.pernyataan');
    Route::get('/lihat-penganut-kk/{ajuan:id}', 'Api\DownloadController@lihatPenganutKk')->name('lihat-penganut.kk');
    Route::get('/lihat-penganut-tanggung/{ajuan:id}', 'Api\DownloadController@lihatPenganutTanggung')->name('lihat-penganut.tanggung');
    Route::get('/lihat-skck-semi/{ajuan:id}', 'Api\DownloadController@lihatSkckSemi')->name('lihat-skck.semi');
    Route::get('/lihat-skck-lengkap/{ajuan:id}', 'Api\DownloadController@lihatSkckLengkap')->name('lihat-skck.lengkap');
    Route::get('/lihat-sktm-anak/{ajuan:id}', 'Api\DownloadController@lihatSktmAnak')->name('lihat-sktm.anak');



    // DELETE: Batalkan Pengajuan
    Route::delete('/ajuan/batalkan/{ajuan:id}', [AjuanController::class, 'destroy']);
    Route::delete('/sktb/batalkan/{ajuan:id}', [SktbController::class, 'destroy']);
    Route::delete('/sku/batalkan/{ajuan:id}', [SkuController::class, 'destroy']);
    Route::delete('/sktm/batalkan/{ajuan:id}', [SktmController::class, 'destroy']);
    Route::delete('/skck/batalkan/{ajuan:id}', [SkckController::class, 'destroy']);
    Route::delete('/puskesos/batalkan/{ajuan:id}', [PuskesosController::class, 'destroy']);
});