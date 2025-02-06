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
        Schema::create('kelengkapanadministrasis', function (Blueprint $table) {
            $table->id();
            $table->string('id_peserta');
            $table->string('nama');
            $table->string('status_keaktifan')->default('aktif');
            $table->string('status_kepesertaan')->nullable();
            $table->string('periode_awal')->nullable();
            $table->string('periode_akhir')->nullable();
            $table->string('surat_keterangan_sehat')->default('surat_keterangan_sehat.pdf');
            $table->string('background_checking')->nullable();
            $table->string('surat_pengantar');
            $table->string('twibbon_in');
            $table->string('surat_pernyataan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelengkapanadministrasis');
    }
};
