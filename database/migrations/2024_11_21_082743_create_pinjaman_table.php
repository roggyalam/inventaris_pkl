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
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pinjaman')->unique(); // Unique code for the loan
            $table->string('tanggal_pinjam');
            $table->string('tanggal_kembali');
            $table->string('peminjam');
            $table->timestamps();
        });

        Schema::create('pinjaman_barang', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_pinjaman')->unsigned();
            $table->foreign('id_pinjaman')->references('id')->on('pinjamen')->onDelete('cascade');
            $table->BigInteger('id_barang')->unsigned();
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
            $table->integer('jumlah'); // Jumlah barang yang dipinjam
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
        Schema::dropIfExists('pinjamen');
        Schema::dropIfExists('pinjaman_barang');

    }
};
