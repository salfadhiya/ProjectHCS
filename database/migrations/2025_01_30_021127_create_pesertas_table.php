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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->string('id_peserta')->primary();
            $table->integer('id_apply')->nullable();
            $table->integer('nomor_kartu')->nullable();
            $table->enum('status_keaktifan', ['aktif', 'tidak aktif'])->nullable();
            $table->enum('status_kepesertaan', ['pkl', 'kp', 'ta'])->nullable();
            $table->enum('jk', ['laki laki', 'perempuan'])->nullable();
            $table->string('gdg_penempatan')->nullable();
            $table->string('pembimbing_perusahaan')->nullable();
            $table->string('unit_penempatan')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('reguler_msib')->nullable();
            $table->string('email')->nullable();
            $table->string('bulan_berakhir')->nullable();
            $table->string('tahun_berakhir')->nullable();
            $table->timestamps();
        });
    }
    ///

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
