<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelahiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelahirans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('jenis');
            $table->string('keterangan')->default('Perlengkapan Administrasi');
            $table->string('kades')->nullable();
            $table->string('ttd')->nullable();
            $table->integer('acc')->default(0);
            $table->text('pesan_penolakan')->nullable();
            $table->integer('nomor')->default(0);
            $table->string('nosurat')->default('0');
            $table->string('kode')->default('0');
            $table->string('hari');
            $table->string('tanggal');
            $table->string('tempat');
            $table->string('pukul');
            $table->string('jk_anak');
            $table->string('anak_ke');
            $table->string('nama_anak');
            $table->string('nama_ibu');
            $table->string('umur_ibu');
            $table->string('agama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_ibu');
            $table->string('nama_ayah');
            $table->string('umur_ayah');
            $table->string('agama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('alamat_ayah');
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
        Schema::dropIfExists('kelahirans');
    }
}
