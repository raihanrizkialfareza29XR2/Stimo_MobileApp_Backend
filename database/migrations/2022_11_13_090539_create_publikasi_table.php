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
        Schema::create('publikasi', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('kategori');
            $table->string('teks_abstrak');
            $table->string('nomor_katalog');
            $table->string('nomor_publikasi');
            $table->string('is_publikasi');
            $table->string('tanggal_publikasi');
            $table->string('ukuran_publikasi');
            $table->string('gambar_publikasi');
            $table->string('file_publikasi');
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
        Schema::dropIfExists('publikasi');
    }
};
