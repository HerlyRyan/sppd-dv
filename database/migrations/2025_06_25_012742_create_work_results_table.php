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
        Schema::create('work_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skp_report_id')
                ->constrained('skp_reports')
                ->onDelete('cascade');

            $table->enum('type', ['utama', 'tambahan']); // Utama atau Tambahan
            $table->string('rencana_hasil_kerja_pimpinan')->nullable(); // RENCANA HASIL KERJA PIMPINAN YANG DIINTERVENSI
            $table->string('rencana_hasil_kerja'); // RENCANA HASIL KERJA
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_results');
    }
};
