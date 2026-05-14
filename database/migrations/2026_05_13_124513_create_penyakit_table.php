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
        Schema::create('penyakit', function (Blueprint $table) {
            $table->integer('id_penyakit', true);
            $table->string('kode_penyakit', 3)->index('kode_penyakit');
            $table->string('nama_penyakit', 50);
            $table->text('deskripsi')->nullable();
            $table->text('solusi_obat')->nullable();
            $table->text('solusi_lain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyakit');
    }
};
