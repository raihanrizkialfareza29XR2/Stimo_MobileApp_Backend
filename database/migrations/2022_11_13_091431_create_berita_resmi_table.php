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
        Schema::create('berita_resmi', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('kategori');
            $table->string('gambar');
            $table->string('preview_text');
            $table->string('tanggal_rilis');
            $table->string('ukuran_file');
            $table->string('file');
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
        Schema::dropIfExists('berita_resmi');
    }
};
