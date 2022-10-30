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
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama');
            $table->string('dekskripsi');
            $table->string('harga');
            $table->integer('stock');
            $table->unsignedBigInteger('id_kategori'); 
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
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
        Schema::dropIfExists('produks');
        // $table->dropUnique('produks_nama_unique');
    }
};
