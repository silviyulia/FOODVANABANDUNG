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
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_user');
        $table->unsignedBigInteger('id_menu'); 
        $table->tinyInteger('rating'); // 1–5
        $table->text('komentar')->nullable();
        $table->timestamps();
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('id_menu')->references('id')->on('menus')->onDelete('cascade');
        
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
