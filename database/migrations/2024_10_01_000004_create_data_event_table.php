<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_event', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->text('deskripsi_event')->nullable();
            $table->datetime('event_mulai'); // Menggabungkan tanggal dan waktu mulai
            $table->datetime('event_berakhir'); // Menggabungkan tanggal dan waktu berakhir
            $table->decimal('htm_event', 15, 2)->nullable();
            $table->string('img')->nullable();
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreignId('id_wisata')
                ->nullable() // Kolom bisa NULL
                ->constrained('data_wisata') 
                ->onDelete('set null') // Set ke NULL jika data dihapus
                ->onUpdate('cascade');  // Perbarui nilai jika data diupdate
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('data_event');
    }
};
