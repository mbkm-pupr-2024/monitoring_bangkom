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
        Schema::create('kegiatan_tahapan', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('aksi');
            $table->string('dokumen');
            $table->string('id_tahapan')->references('id')->on('tahapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
