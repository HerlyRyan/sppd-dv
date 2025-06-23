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
        Schema::create('sppds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('tujuan_sppd');
            $table->string('transportasi');
            $table->string('tempat_berangkat');
            $table->string('tempat_tujuan');
            $table->string('durasi_sppd');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_kembali');
            $table->string('pejabat_pembuat_komitmen');
            $table->integer('biaya_sppd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sppds');
    }
};
