<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjadwalan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjadwalan', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time_start');
            $table->string('time_end');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('meet_room')->nullable();
            $table->unsignedBigInteger('topik_skripsi_id')->index();
            $table->timestamps();

            $table->foreign('topik_skripsi_id')->references('id')->on('topik_skripsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjadwalan');
    }
}
