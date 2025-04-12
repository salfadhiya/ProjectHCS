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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('id_peserta', 255);
            $table->integer('sakit')->nullable()->default(0);
            $table->integer('izin')->nullable()->default(0);
            $table->integer('alfa')->nullable()->default(0);
            $table->integer('terlambat')->nullable()->default(0);
            $table->integer('wfh')->nullable()->default(0);
            $table->integer('project')->nullable()->default(0);
            $table->integer('zumba')->nullable()->default(0);
            $table->integer('dhuha')->nullable()->default(0);
            $table->enum('sharing', ['yes', 'no'])->nullable()->default('no');
            $table->enum('saction', ['yes', 'no'])->nullable()->default('no');
            $table->enum('backchecking', ['yes', 'no'])->nullable()->default('no');
            $table->string('sp', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_peserta')
                  ->references('id_peserta')
                  ->on('pesertas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
