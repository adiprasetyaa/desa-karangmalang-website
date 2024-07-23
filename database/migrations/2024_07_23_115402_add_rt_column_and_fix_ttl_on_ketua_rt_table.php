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
        Schema::table('ketua_rt', function (Blueprint $table) {
            $table->string('rt')->after('id');
            $table->string('tempat_lahir')->after('Nama');
            $table->date('tanggal_lahir')->after('tempat_lahir');
            $table->dropColumn('TTL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketua_rt', function (Blueprint $table) {
            $table->dropColumn('rt');
            $table->dropColumn('tempat_lahir');
            $table->dropColumn('tanggal_lahir');
            $table->string('TTL');
        });
    }
};
