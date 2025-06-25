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
        Schema::create('work_behaviors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skp_report_id')
                ->constrained('skp_reports')
                ->onDelete('cascade');

            $table->string('perilaku_kerja'); // Berorientasi Pelayanan, Akuntabel, Kompeten, dll.
            $table->text('deskripsi_perilaku')->nullable(); // Memahami dan memenuhi kebutuhan masyarakat, Ramah, cekatan, solutif, dll.
            $table->string('ekspektasi_pimpinan'); // Sesuai Ekspektasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_behaviors');
    }
};
