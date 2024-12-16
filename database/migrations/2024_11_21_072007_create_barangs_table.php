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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->BigInteger('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('kategoris')->ondelete('cascade');
            $table->enum('kondisi', ['Baik', 'Rusak', 'Perbaikan'])->default('Baik');
            $table->BigInteger('id_ruangan')->unsigned();
            $table->foreign('id_ruangan')->references('id')->on('ruangans')->ondelete('cascade');
            $table->string('alamat');
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
        Schema::dropIfExists('barangs');
    }
};
