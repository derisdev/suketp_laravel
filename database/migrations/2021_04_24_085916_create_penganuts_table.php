<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenganutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penganuts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->string('organisasi');
            $table->string('saksi_1');
            $table->string('agama_sebelumnya');
            $table->string('dasar_perubahan');
            $table->date('tanggal_perubahan');
            $table->string('saksi_2');
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
        Schema::dropIfExists('penganuts');
    }
}
