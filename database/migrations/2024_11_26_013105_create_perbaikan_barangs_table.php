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
        Schema::create('perbaikan_barangs', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_barang')->unsigned();
            $table->foreign('id_barang')->references('id')->on('barangs')->ondelete('cascade');
            $table->string('tanggal_perbaikan');
            $table->string('tindakan');
            $table->enum('status_perbaikan', ['Selesai', 'Proses'])->default('Selesai');
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
        Schema::dropIfExists('perbaikan_barangs');
    }
};
