<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->string('id_peserta'); // id_peserta sebagai string
            $table->string('nama');
            $table->date('tanggal');
            $table->enum('presensi', ['Hadir', 'Tidak Hadir']);
            $table->enum('jenis_absensi', ['zumat', 'zumin', 'jogging', 'dhuha', 'saction', 'lunch']);
            $table->timestamps();
//
            // Foreign key ke tabel Peserta
            $table->foreign('id_peserta')->references('id_peserta')->on('pesertas')->onDelete('cascade');
        });
    }

    public function down()
{
    Schema::table('absensis', function (Blueprint $table) {
        $table->dropForeign(['id_peserta']); // Hapus foreign key terlebih dahulu
    });

    Schema::dropIfExists('absensis');
}
};
