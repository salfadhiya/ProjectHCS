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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->string('id_peserta');
            $table->integer('penguasaan_bid_kerja');
            $table->integer('kemampuan_pemecahan_masalah');
            $table->integer('keterampilan_teknis');
            $table->integer('kualitas_mutu_hasil_kerja');
            $table->integer('ketepatan_waktu');
            $table->integer('kejujuran');
            $table->integer('kedisiplinan');
            $table->integer('tanggung_jawab');
            $table->integer('motivasi');
            $table->integer('inisitatif');
            $table->integer('kerja_sama_tim');
            $table->integer('interaksi_sosial');
            $table->integer('rata_rata');
            $table->integer('jumlah');
            $table->timestamps();
       });
    }
    //

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
