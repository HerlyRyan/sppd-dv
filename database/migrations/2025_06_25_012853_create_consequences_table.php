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
        Schema::create('consequences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skp_report_id')
                ->constrained('skp_reports')
                ->onDelete('cascade');

            $table->text('description'); // penghargaan kepada Pegawai baik materiil maupun non materiil; dan/atau...
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consequences');
    }
};
