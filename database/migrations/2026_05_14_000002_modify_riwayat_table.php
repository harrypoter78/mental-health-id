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
        Schema::table('riwayat', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id_riwayat')->constrained('users', 'id')->onDelete('cascade');
            $table->dropColumn('nama_pasien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayat', function (Blueprint $table) {
            $table->dropForeignKeyConstraints();
            $table->dropColumn('user_id');
            $table->string('nama_pasien', 20)->after('id_riwayat');
        });
    }
};
