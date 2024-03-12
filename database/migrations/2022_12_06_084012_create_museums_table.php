<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('museums', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambarUtama');
            $table->string('alamatLengkap');
            $table->string('alamatKota');
            $table->string('deskripsi');
            $table->string('linkGoogleMap');
            $table->string('linkVirtualTour');
            $table->double('rating');
            $table->double('lrfu_score')->default(0);
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
        Schema::dropIfExists('museums');
    }
};