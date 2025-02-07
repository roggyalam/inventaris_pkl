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
            $table->BigInteger('id_barang')->unsigned();
            $table->foreign('id_barang')->references('id')->on('barangs')->ondelete('cascade');
            $table->enum('kondisi_barang', ['Baik', 'Rusak', 'Hilang'])->default('Baik');
            $table->date('tanggal_kembali');
            $table->string('catatan');
            $table->timestamps();
        });

        Schema::create('pengembalian_barang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_pengembalian')->unsigned();
            $table->foreign('id_pengembalian')->references('id')->on('pengembalians')->onDelete('cascade');
            $table->BigInteger('id_barang')->unsigned();
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
            $table->enum('kondisi_barang', ['Baik', 'Rusak', 'Hilang'])->default('Baik');
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
        Schema::dropIfExists('pengembalian_barang');
    }
};
