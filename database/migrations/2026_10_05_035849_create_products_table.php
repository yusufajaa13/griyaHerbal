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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // DATA UTAMA PRODUK
            $table->string('name');                  // Menyimpan Nama Produk (Teks Pendek)
            $table->text('description');             // Menyimpan Spesifikasi (Teks Panjang)
            $table->integer('price');                // Menyimpan Harga (Khusus Angka Bulat)
            $table->string('image')->nullable();     // Menyimpan Nama File Foto (Boleh kosong)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
