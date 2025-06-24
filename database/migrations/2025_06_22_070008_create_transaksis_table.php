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
        $table->unsignedBigInteger('id_user'); // foreign key ke users
        $table->decimal('total_harga', 12, 2); 
        $table->text('alamat_pengiriman')->nullable();
        $table->string('no_hp')->nullable();
        $table->string('metode_pembayaran');
        $table->string('status')->default('pending'); 
        $table->timestamp('tanggal_transaksi')->useCurrent();
        $table->timestamps();
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
