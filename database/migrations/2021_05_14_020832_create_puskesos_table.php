<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuskesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puskesos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('jenis');
            $table->string('keperluan')->nullable();
            $table->string('keterangan')->default('Perlengkapan Administrasi');
            $table->string('kades')->nullable();
            $table->string('ttd')->nullable();
            $table->integer('acc')->default(0);
            $table->text('pesan_penolakan')->nullable();
            $table->integer('nomor')->default(0);
            $table->string('nosurat')->default('0');
            $table->string('kode')->default('0');
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
        Schema::dropIfExists('puskesos');
    }
}
