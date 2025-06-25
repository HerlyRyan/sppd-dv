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
        Schema::create('skp_reports', function (Blueprint $table) {
            $table->id();
            // Kolom foreign key untuk pegawai yang dinilai (merujuk ke tabel 'users')
            $table->foreignId('pegawai_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Kolom foreign key untuk penilai (merujuk ke tabel 'users')
            $table->foreignId('penilai_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->date('periode_mulai');
            $table->date('periode_selesai');
            $table->date('tanggal_penilaian')->nullable(); // Tanggal penilaian, seperti "4 Juni 2025"
            $table->timestamps();
        });                
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skp_reports');        
    }
};
