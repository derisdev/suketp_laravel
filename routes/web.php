<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// USER
Route::middleware('auth')->group(function () {
    // Index
    Route::get('/home', 'HomeController@index')->name('home');
    // Surat Saya
    Route::get('/surat-saya', 'HomeController@suratSaya')->name('suratsaya');
    Route::get('/surat-saya/diterima', 'HomeController@diterima')->name('diterima');
    Route::get('/surat-saya/ditolak', 'HomeController@ditolak')->name('ditolak');
    Route::get('/surat-saya/menunggu', 'HomeController@menunggu')->name('menunggu');
    // Edit Profil
    Route::get('/edit-profil', 'User\UserController@editProfil')->name('edit.profil');
    Route::patch('/edit-profil', 'User\UserController@update')->name('update.profil');
    Route::patch('/ganti-password', 'User\UserController@gantiPassword')->name('ganti-password.profil');
    // Lengkapi Profil
    Route::get('/lengkapi-profil', 'User\UserController@lengkapiProfil')->name('lengkapi.profil');
    Route::post('/lengkapi-profil', 'User\UserController@storeLengkapi')->name('lengkapi.update');


    // CREATE: Form Ajuan
    Route::get('/kebakaran', 'User\AjuanController@kebakaranForm')->name('kebakaran.create');
    Route::get('/serbaguna', 'User\AjuanController@serbagunaForm')->name('serbaguna.create');
    Route::get('/penghasilan', 'User\AjuanController@penghasilanForm')->name('penghasilan.create');
    Route::get('/ktp-expire', 'User\AjuanController@ktpExpireForm')->name('ktpExpire.create');
    Route::get('/kehilangan', 'User\AjuanController@kehilanganForm')->name('kehilangan.create');
    Route::get('/sk', 'User\AjuanController@skForm')->name('sk.create');
    Route::get('/sd', 'User\AjuanController@sdForm')->name('sd.create');
    Route::get('/belum-menikah', 'User\AjuanController@belumMenikahForm')->name('belum-menikah.create');
    Route::get('/janda-duda', 'User\AjuanController@jandaDudaForm')->name('janda-duda.create');
    Route::get('/diluar-kota', 'User\AjuanController@diluarKotaForm')->name('diluar-kota.create');
    Route::get('/kuasa', 'User\AjuanController@kuasaForm')->name('kuasa.create');
    Route::get('/izin-ortu', 'User\AjuanController@izinOrtuForm')->name('izin-ortu.create');
    Route::get('/tidak-kerja', 'User\AjuanController@tidakKerjaForm')->name('tidak-kerja.create');
    Route::get('/ahli-waris', 'User\AjuanController@ahliWarisForm')->name('ahli-waris.create');
    Route::get('/beda-nama', 'User\AjuanController@bedaNamaForm')->name('beda-nama.create');
    Route::get('/izin-keramaian', 'User\AjuanController@izinKeramaianForm')->name('izin-keramaian.create');
    Route::get('/penganut', 'User\AjuanController@penganutForm')->name('penganut.create');
    Route::get('/batal-menganut', 'User\AjuanController@batalMenganutForm')->name('batal-menganut.create');
    // // Form Ajuan Non-harian
    Route::get('/kelahiran', 'User\KelahiranController@create')->name('kelahiran.create');
    Route::get('/sktb', 'User\SktbController@create')->name('sktb.create');
    Route::get('/sktb2', 'User\SktbController@create2')->name('sktb2.create');
    Route::get('/sku', 'User\SkuController@create')->name('sku.create');
    Route::get('/skck', 'User\SkckController@create')->name('skck.create');
    Route::get('/puskesos', 'User\PuskesosController@create')->name('puskesos.create');
    Route::get('/sktm', 'User\SktmController@create')->name('sktm.create');
    // Route::get('/sktm', 'User\SktmController@create')->middleware('permission:lengkap')->name('sktm.create');


    // STORE
    Route::post('/home', 'User\AjuanController@store')->name('store');
    Route::post('/sktb', 'User\SktbController@store')->name('sktb.store');
    // // Store Non-Harian
    Route::post('/kelahiran', 'User\KelahiranController@store')->name('kelahiran.store');
    Route::post('/sktb', 'User\SktbController@store')->name('sktb.store');
    Route::post('/sktb2', 'User\SktbController@store2')->name('sktb2.store');
    Route::post('/sku', 'User\SkuController@store')->name('sku.store');
    Route::post('/sktm', 'User\SktmController@store')->name('sktm.store');
    Route::post('/skck', 'User\SkckController@store')->name('skck.store');
    Route::post('/puskesos', 'User\PuskesosController@store')->name('puskesos.store');


    // SHOW: Lihat dan Download
    Route::get('/download/{ajuan:id}', 'User\DownloadController@download')->name('download');
    Route::get('/suket/{ajuan:id}', 'User\DownloadController@lihat')->name('lihat');
    Route::get('/download-sktb/{ajuan:id}', 'User\DownloadController@sktbDownload')->name('sktb.download');
    Route::get('/suket-sktb/{ajuan:id}', 'User\DownloadController@sktbLihat')->name('sktb.lihat');
    Route::get('/download-skkd/{ajuan:id}', 'User\DownloadController@skkdDownload')->name('skkd.download');
    Route::get('/suket-skkd/{ajuan:id}', 'User\DownloadController@skkdLihat')->name('skkd.lihat');
    Route::get('/download-sku/{ajuan:id}', 'User\DownloadController@skuDownload')->name('sku.download');
    Route::get('/suket-sku/{ajuan:id}', 'User\DownloadController@skuLihat')->name('sku.lihat');
    Route::get('/download-sktm/{ajuan:id}', 'User\DownloadController@sktmDownload')->name('sktm.download');
    Route::get('/suket-sktm/{ajuan:id}', 'User\DownloadController@sktmLihat')->name('sktm.lihat');
    Route::get('/download-skck/{ajuan:id}', 'User\DownloadController@skckDownload')->name('skck.download');
    Route::get('/suket-skck/{ajuan:id}', 'User\DownloadController@skckLihat')->name('skck.lihat');
    Route::get('/download-puskesos/{ajuan:id}', 'User\DownloadController@puskesosDownload')->name('puskesos.download');
    Route::get('/suket-puskesos/{ajuan:id}', 'User\DownloadController@puskesosLihat')->name('puskesos.lihat');
    // // download pernyataan dan tambahan
    Route::get('/domisili-pernyataan/{ajuan:id}', 'User\DownloadController@domisiliPernyataan')->name('domisili.pernyataan');
    Route::get('/keramaian-pernyataan/{ajuan:id}', 'User\DownloadController@keramaianPernyataan')->name('keramaian.pernyataan');
    Route::get('/penganut-kk/{ajuan:id}', 'User\DownloadController@penganutKk')->name('penganut.kk');
    Route::get('/penganut-tanggung/{ajuan:id}', 'User\DownloadController@penganutTanggung')->name('penganut.tanggung');
    Route::get('/skck-semi/{ajuan:id}', 'User\DownloadController@skckSemi')->name('skck.semi');
    Route::get('/skck-lengkap/{ajuan:id}', 'User\DownloadController@skckLengkap')->name('skck.lengkap');
    Route::get('/sktm-anak/{ajuan:id}', 'User\DownloadController@sktmAnak')->name('sktm.anak');
    // // cetak pernyataan dan tambahan
    Route::get('/lihat-domisili-pernyataan/{ajuan:id}', 'User\DownloadController@lihatDomisiliPernyataan')->name('lihat-domisili.pernyataan');
    Route::get('/lihat-keramaian-pernyataan/{ajuan:id}', 'User\DownloadController@lihatKeramaianPernyataan')->name('lihat-keramaian.pernyataan');
    Route::get('/lihat-penganut-kk/{ajuan:id}', 'User\DownloadController@lihatPenganutKk')->name('lihat-penganut.kk');
    Route::get('/lihat-penganut-tanggung/{ajuan:id}', 'User\DownloadController@lihatPenganutTanggung')->name('lihat-penganut.tanggung');
    Route::get('/lihat-skck-semi/{ajuan:id}', 'User\DownloadController@lihatSkckSemi')->name('lihat-skck.semi');
    Route::get('/lihat-skck-lengkap/{ajuan:id}', 'User\DownloadController@lihatSkckLengkap')->name('lihat-skck.lengkap');
    Route::get('/lihat-sktm-anak/{ajuan:id}', 'User\DownloadController@lihatSktmAnak')->name('lihat-sktm.anak');



    // DELETE: Batalkan Pengajuan
    Route::delete('/ajuan/batalkan/{ajuan:id}', 'User\AjuanController@destroy')->name('ajuan.batalkan');
    Route::delete('/sktb/batalkan/{ajuan:id}', 'User\SktbController@destroy')->name('sktb.batalkan');
    Route::delete('/sku/batalkan/{ajuan:id}', 'User\SkuController@destroy')->name('sku.batalkan');
    Route::delete('/skck/batalkan/{ajuan:id}', 'User\SkckController@destroy')->name('skck.batalkan');
    Route::delete('/puskesos/batalkan/{ajuan:id}', 'User\PuskesosController@destroy')->name('puskesos.batalkan');
    Route::delete('/kelahiran/batalkan/{ajuan:id}', 'User\PuskesosController@destroy')->name('kelahiran.batalkan');
});


// ADMIN
Route::group(['middleware' => ['can:setingumum']], function () {
    // DASHBOARD
    Route::get('/dashboard-adm', 'Admin\DashboardController@index')->name('admin.dashboard');
    // KELOLA USER
    Route::get('/user', 'Admin\PendudukController@index')->name('user.index');
    Route::get('/user/{user:id}', 'Admin\PendudukController@show')->name('user.show');
    Route::patch('/user/{user:id}', 'Admin\PendudukController@update')->name('user.update');
    Route::delete('/user/{user:id}', 'Admin\PendudukController@destroy')->name('user.delete');


    // KELOLA SURAT (Dashboard Surat)
    Route::get('/surat', 'Admin\SuratController@index')->name('surat.index');
    // Kelola Keperluan
    Route::post('/keperluan', 'Admin\KeperluanController@store')->name('keperluan.store');
    Route::patch('/keperluan/{keperluan:id}/update', 'Admin\KeperluanController@update')->name('keperluan.update');
    Route::delete('/keperluan/{keperluan:id}/delete', 'Admin\KeperluanController@destroy')->name('keperluan.delete');
    // Kelola Pesan Penolakan
    Route::post('pesan-penolakan', 'Admin\PesanPenolakanController@store')->name('pesan-penolakan.store');
    Route::patch('pesan-penolakan/{pesan_penolakan:id}/update', 'Admin\PesanPenolakanController@update')->name('pesan-penolakan.update');
    Route::delete('pesan-penolakan/{pesan_penolakan:id}/delete', 'Admin\PesanPenolakanController@destroy')->name('pesan-penolakan.delete');


    // ANTRIAN SURAT
    Route::get('/antrian', 'Admin\AntrianController@index')->name('antrian.index');
    Route::get('/antrian/{surat:id}', 'Admin\AntrianController@show')->name('antrian.show');
    Route::get('/antrian/{surat:id}/acc', 'Admin\AntrianController@edit')->name('antrian.edit');
    Route::patch('/antrian/{surat:id}/acc', 'Admin\AntrianController@update')->name('antrian.update');
    Route::post('/tolak/{ajuan:id}', 'Admin\AntrianController@tolak')->name('antrian.tolak');
    // // non harian
    // // // sktb
    Route::get('/antrian-sktb/{sktb:id}/acc', 'Admin\AntrianController@editSktb')->name('antrian-sktb.edit');
    Route::patch('/antrian-sktb/{sktb:id}/acc', 'Admin\AntrianController@updateSktb')->name('antrian-sktb.update');
    Route::post('/sktb-tolak/{sktb:id}', 'Admin\AntrianController@sktbTolak')->name('sktb.tolak');
    // // // sku
    Route::get('/antrian-sku/{sku:id}/acc', 'Admin\AntrianController@editSku')->name('antrian-sku.edit');
    Route::patch('/antrian-sku/{sku:id}/acc', 'Admin\AntrianController@updateSku')->name('antrian-sku.update');
    Route::post('/sku-tolak/{sku:id}', 'Admin\AntrianController@skuTolak')->name('sku.tolak');
    // // // sktm
    Route::get('/antrian-sktm/{sktm:id}/acc', 'Admin\AntrianController@editSktm')->name('antrian-sktm.edit');
    Route::patch('/antrian-sktm/{sktm:id}/acc', 'Admin\AntrianController@updateSktm')->name('antrian-sktm.update');
    Route::post('/sktm-tolak/{sktm:id}', 'Admin\AntrianController@sktmTolak')->name('sktm.tolak');
    // // // skck
    Route::get('/antrian-skck/{skck:id}/acc', 'Admin\AntrianController@editSkck')->name('antrian-skck.edit');
    Route::patch('/antrian-skck/{skck:id}/acc', 'Admin\AntrianController@updateSkck')->name('antrian-skck.update');
    Route::post('/skck-tolak/{skck:id}', 'Admin\AntrianController@skckTolak')->name('skck.tolak');
    // // // puskesos
    Route::get('/antrian-puskesos/{puskesos:id}/acc', 'Admin\AntrianController@editPuskesos')->name('antrian-puskesos.edit');
    Route::patch('/antrian-puskesos/{puskesos:id}/acc', 'Admin\AntrianController@updatePuskesos')->name('antrian-puskesos.update');
    Route::post('/puskesos-tolak/{puskesos:id}', 'Admin\AntrianController@tolakPuskesos')->name('puskesos.tolak');
    // // // kelahiran
    Route::get('/antrian-kelahiran/{kelahiran:id}/acc', 'Admin\AntrianController@editKelahiran')->name('antrian-kelahiran.edit');
    Route::patch('/antrian-kelahiran/{kelahiran:id}/acc', 'Admin\AntrianController@updateKelahiran')->name('antrian-kelahiran.update');
    Route::post('/kelahiran-tolak/{kelahiran:id}', 'Admin\AntrianController@kelahiranTolak')->name('kelahiran.tolak');


    // ARSIP
    Route::get('/arsip', 'Admin\ArsipController@index')->name('arsip.index');
    Route::get('/adm-dwnld/{a:id}', 'Admin\ArsipController@download')->name('adm.download');
    Route::get('/adm-suket/{a:id}', 'Admin\ArsipController@lihat')->name('adm.lihat');
    // // non-harian
    // // // Sktb
    Route::get('/arsip-sktb', 'Admin\ArsipController@sktb')->name('arsip.sktb');
    Route::get('/adm-dwnld-sktb/{sktb:id}', 'Admin\ArsipController@sktbDownload')->name('adm-sktb.download');
    Route::get('/adm-suket-sktb/{sktb:id}', 'Admin\ArsipController@sktbLihat')->name('adm-sktb.lihat');
    // // // Sku
    Route::get('/arsip-sku', 'Admin\ArsipController@sku')->name('arsip.sku');
    Route::get('/adm-dwnld-sku/{sku:id}', 'Admin\ArsipController@skuDownload')->name('adm-sku.download');
    Route::get('/adm-suket-sku/{sku:id}', 'Admin\ArsipController@skuLihat')->name('adm-sku.lihat');
    // // // Sktm
    Route::get('/arsip-sktm', 'Admin\ArsipController@sktm')->name('arsip.sktm');
    Route::get('/adm-dwnld-sktm/{sktm:id}', 'Admin\ArsipController@sktmDownload')->name('adm-sktm.download');
    Route::get('/adm-suket-sktm/{sktm:id}', 'Admin\ArsipController@sktmLihat')->name('adm-sktm.lihat');
    // // // Skck
    Route::get('/arsip-skck', 'Admin\ArsipController@skck')->name('arsip.skck');
    Route::get('/adm-dwnld-skck/{skck:id}', 'Admin\ArsipController@skckDownload')->name('adm-skck.download');
    Route::get('/adm-suket-skck/{skck:id}', 'Admin\ArsipController@skckLihat')->name('adm-skck.lihat');
    // // // Puskesos
    Route::get('/arsip-puskesos', 'Admin\ArsipController@puskesos')->name('arsip.puskesos');
    Route::get('/adm-dwnld-puskesos/{puskesos:id}', 'Admin\ArsipController@puskesosDownload')->name('adm-puskesos.download');
    Route::get('/adm-suket-puskesos/{puskesos:id}', 'Admin\ArsipController@puskesosLihat')->name('adm-puskesos.lihat');


    // RIWAYAT PENGAJUAN
    Route::get('/riwayat-pengajuan', 'Admin\RiwayatController@index')->name('riwayat.index');
    // // non-harian

    // LAPORAN EXCEL
    Route::get('/arsip-laporan', 'Admin\ArsipController@laporan')->name('arsip.laporan');
    Route::get('/sktb-laporan', 'Admin\ArsipController@sktbLaporan')->name('sktb.laporan');
    Route::get('/sku-laporan', 'Admin\ArsipController@skuLaporan')->name('sku.laporan');
    Route::get('/sktm-laporan', 'Admin\ArsipController@sktmLaporan')->name('sktm.laporan');
    Route::get('/skck-laporan', 'Admin\ArsipController@skckLaporan')->name('skck.laporan');
    Route::get('/puskesos-laporan', 'Admin\ArsipController@puskesosLaporan')->name('puskesos.laporan');
});


// SUPERADMIN
Route::group(['middleware' => ['role:superadmin']], function () {
    // Kelola Admin
    Route::get('/admin', 'Super\AdminController@index')->name('admin.index');
    Route::get('/admin/{admin:id}', 'Super\AdminController@show')->name('admin.show');
    Route::get('/admin-tambah', 'Super\AdminController@create')->name('admin.create');
    Route::delete('/admin/{admin:id}', 'Super\AdminController@destroy')->name('admin.delete');
    Route::post('/admin/{admin:id}', 'Super\AdminController@store')->name('admin.store');
    // Kelola Kades
    Route::get('/kades', 'Super\KadesController@index')->name('kades.index');
    Route::post('/kades', 'Super\KadesController@store')->name('kades.store');
    Route::post('/aktifkan-kades/{k:id}', 'Super\KadesController@aktifkan')->name('kades.aktifkan');
    Route::get('/kades/{k:id}/edit', 'Super\KadesController@edit')->name('kades.edit');
    Route::patch('/kades/{k:id}', 'Super\KadesController@update')->name('kades.update');
    Route::patch('/fotokades/{k:id}', 'Super\KadesController@foto')->name('kades.foto');
    Route::delete('/kades/{k:id}', 'Super\KadesController@destroy')->name('kades.delete');
});
