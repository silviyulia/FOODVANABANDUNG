<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable(); // nama file gambar
        $table->decimal('rating', 3, 2)->default(0); // contoh: 4.5
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
