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
        Schema::create('supporting_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skp_report_id')
                ->constrained('skp_reports')
                ->onDelete('cascade');

            $table->string('resource_name'); // sumber daya manusia, anggaran, peralatan kerja, dll.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supporting_resources');
    }
};
