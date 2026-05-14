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
        Schema::table('rule', function (Blueprint $table) {
            $table->foreign(['kode_gejala'], 'FK_rule_gejala')->references(['kode_gejala'])->on('gejala')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['kode_penyakit'], 'FK_rule_penyakit')->references(['kode_penyakit'])->on('penyakit')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rule', function (Blueprint $table) {
            $table->dropForeign('FK_rule_gejala');
            $table->dropForeign('FK_rule_penyakit');
        });
    }
};
