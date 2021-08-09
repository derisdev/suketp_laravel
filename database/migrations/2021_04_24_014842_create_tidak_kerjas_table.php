<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTidakKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tidak_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->string('alasan');
            $table->date('tanggal');
            $table->string('hari');
            $table->string('perusahaan');
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
        Schema::dropIfExists('tidak_kerjas');
    }
}
