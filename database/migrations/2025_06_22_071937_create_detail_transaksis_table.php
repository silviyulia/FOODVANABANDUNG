<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
   Schema::create('transaksis', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('id_user');
    $table->integer('total_harga');
    $table->string('alamat_pengiriman');
    $table->string('no_hp');
    $table->string('metode_pembayaran');
    $table->string('status')->default('diproses');
    $table->dateTime('tanggal_transaksi');
    $table->timestamps();

    $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
