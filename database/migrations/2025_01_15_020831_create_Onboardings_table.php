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
        Schema::create('Onboardings', function (Blueprint $table) {
            $table->id('id_apply'); // Auto increment primary key
            $table->string('nama');
            $table->string('jurusan');
            $table->string('no_telp');
            $table->string('asal_instansi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Onboardings');
    }
};
