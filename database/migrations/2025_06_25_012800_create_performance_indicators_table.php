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
        Schema::create('performance_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_result_id')
                ->constrained('work_results')
                ->onDelete('cascade');

            $table->string('aspek'); // Kuantitas, Kualitas, Waktu
            $table->string('indikator_kinerja_individu'); // Jumlah Dokumen Pelayanan Kesejahteraan Sosial
            $table->string('target'); // 1 Dokumen, 100%, 1 Bulan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_indicators');
    }
};
