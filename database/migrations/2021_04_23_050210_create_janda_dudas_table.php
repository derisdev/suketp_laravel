<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJandaDudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('janda_dudas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ajuan_id');
            $table->string('janda_duda', 191);
            $table->string('pasangan', 191);
            $table->string('kepemilikan', 191);
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
        Schema::dropIfExists('janda_dudas');
    }
}
