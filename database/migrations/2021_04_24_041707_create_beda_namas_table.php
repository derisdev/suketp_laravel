<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedaNamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beda_namas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->string('perbedaan');
            $table->string('dokumen_salah');
            $table->string('tertulis_salah');
            $table->string('dokumen_benar');
            $table->string('tertulis_benar');
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
        Schema::dropIfExists('beda_namas');
    }
}
