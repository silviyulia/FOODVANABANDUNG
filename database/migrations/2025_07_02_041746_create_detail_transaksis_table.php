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
        Schema::create('detail_transaksis', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('id_transaksi');
    $table->unsignedBigInteger('id_menu');
    $table->integer('jumlah');
    $table->integer('harga_satuan');
    $table->integer('subtotal');
    $table->timestamps();

    $table->foreign('id_transaksi')->references('id')->on('transaksis')->onDelete('cascade');
    $table->foreign('id_menu') -> references('id')-> on('menus')-> onDelete('cascade');
    
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
