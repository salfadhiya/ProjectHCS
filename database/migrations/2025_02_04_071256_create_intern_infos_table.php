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
        Schema::create('intern_infos', function (Blueprint $table) {
            $table->id('id_apply'); // Auto increment primary key
            $table->string('nomor_form')->nullable();
            $table->integer('nis_nim_nip')->nullable();
            $table->string('kompetensi_keahlian')->nullable();
            $table->string('kategori_peserta')->nullable();
            $table->date('tanggal_pengajuan')->nullable();
            $table->integer('nilai_psikotes')->nullable();
            $table->integer('nilai_wawancara')->nullable();
            $table->string('hasil_seleksi')->nullable();
            $table->string('nomor_surat_konfirmasi')->nullable();
            $table->date('tanggal_surat_konfirmasi')->nullable();
            $table->string('link_surat_konfirmasi')->nullable();
            $table->timestamps();
//
            // Foreign key ke tabel Onboardings
            $table->foreign('id_apply')->references('id_apply')->on('onboardings')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intern_infos');
    }
};
