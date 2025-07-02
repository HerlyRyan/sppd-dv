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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->constrained('positions');
            $table->foreignId('grade_id')->constrained('grades');
            $table->foreignId('agency_id')->constrained('agencies');            
            $table->string('nip')->unique();
            $table->string('nama_pegawai');
            $table->string('npwp');
            $table->enum('jenis_kelamin', ['L', 'P']);        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
