<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->integer('harga');

            // foreign key harus ke tabel "kategoris"
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');

            // foreign key ke tabel "tokos"
            $table->foreignId('toko_id')->constrained('tokos')->onDelete('cascade');

            // foreign key ke tabel "users"
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // foto produk
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
