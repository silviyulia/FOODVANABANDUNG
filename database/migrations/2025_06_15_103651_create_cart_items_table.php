<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Kolom id auto increment
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_menu')->constrained('menus')->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamp('added_at')->useCurrent();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cart_items');
    }
};
