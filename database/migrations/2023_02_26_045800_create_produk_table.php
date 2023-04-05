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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('id_kategori')->nullable();
            
            $table->integer('harga');
            $table->integer('stok');
            $table->integer('ukuran')->nullable();
            $table->integer('warna')->nullable();
            $table->longText('deskripsi');
            $table->tinyInteger('trending')->default('0')->comment('1=trending, 0=not-trending');
            $table->tinyInteger('status')->default('0')->comment('1=hidden, 0=visible');

            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');

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
        Schema::dropIfExists('produk');
    }
};
