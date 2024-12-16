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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_peminjaman')->unsigned();
            $table->foreign('id_peminjaman')->references('id')->on('pinjamen')->ondelete('cascade');
            $table->enum('kondisi_barang', ['Baik', 'Rusak', 'Rusak ringan'])->default('Baik');
            $table->string('tanggal_kembali');
            $table->string('kerusakan');
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
        Schema::dropIfExists('pengembalians');
    }
};
