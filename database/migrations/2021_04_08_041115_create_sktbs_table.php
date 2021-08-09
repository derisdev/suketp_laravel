<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSktbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sktbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('jenis');
            $table->string('keterangan')->default('Perlengkapan Administrasi');
            $table->string('keperluan')->default('.');
            $table->string('kades')->nullable();
            $table->string('ttd')->nullable();
            $table->integer('acc')->default(0);
            $table->text('pesan_penolakan')->nullable();
            $table->integer('nomor')->default(0);
            $table->string('nosurat')->default('0');
            $table->string('kode')->default('0');
            $table->string('pemilik', 191);
            $table->string('memiliki', 191);
            $table->string('lokasi', 191);
            $table->string('luas', 191);
            $table->string('luas_persegi', 191);
            $table->string('harga', 191);
            $table->string('harga_terbilang', 191);
            $table->string('total_harga_tanah', 191);
            $table->string('nominal_bangunan')->nullable();
            $table->string('terbilang_bangunan')->nullable();
            $table->string('total_harga', 191);
            $table->string('utara')->nullable();
            $table->string('barat')->nullable();
            $table->string('selatan')->nullable();
            $table->string('timur')->nullable();
            $table->string('blok')->nullable();
            $table->string('akta')->nullable();
            $table->string('no_akta')->nullable();
            $table->string('no_personil')->nullable();
            $table->string('no_kohir')->nullable();
            $table->string('no_shm')->nullable();
            $table->string('no_nib')->nullable();
            $table->string('no_surat_ukur')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sktbs');
    }
}
