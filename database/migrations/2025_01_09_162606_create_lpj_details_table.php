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
        Schema::create('lpj_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lpj_header_id')->constrained();
            $table->string('nama_kegiatan');
            $table->string('biaya_kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpj_details');
    }
};
