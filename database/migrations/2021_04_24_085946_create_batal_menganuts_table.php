<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatalMenganutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batal_menganuts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->string('organisasi');
            $table->string('agama_baru');
            $table->string('dasar_perubahan');
            $table->date('tanggal_perubahan');
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
        Schema::dropIfExists('batal_menganuts');
    }
}
