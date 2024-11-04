<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_kuliner', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kuliner');
            $table->text('deskripsi_kuliner')->nullable();
            $table->string('gambar_kuliner')->nullable();
            $table->string('gambar_menu')->nullable();
            $table->timestamps();
            
            // Ubah 'data_kategoris' menjadi 'data_wisata' jika itu tabel yang benar
            $table->foreignId('id_wisata')->constrained(
                table: 'data_wisatas',
                indexName: 'kuliner_id'
            )->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_kuliner');
    }
};

