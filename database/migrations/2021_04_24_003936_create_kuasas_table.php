<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuasas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->string('nama');
            $table->string('nik');
            $table->string('umur');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('desa');
            $table->string('kecamatan');
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
        Schema::dropIfExists('kuasas');
    }
}
