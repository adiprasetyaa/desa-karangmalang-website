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
        // drop ttl,agama, NoSK, PeriodeStart, PeriodeEnd
        Schema::table('perangkat_desa', function (Blueprint $table) {
            $table->dropColumn('TTL');
            $table->dropColumn('Agama');
            $table->dropColumn('NoSK');
            $table->dropColumn('PeriodeStart');
            $table->dropColumn('PeriodeEnd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perangkat_desa', function (Blueprint $table) {
            $table->date('TTL')->nullable();
            $table->string('Agama');
            $table->string('NoSK');
            $table->date('PeriodeStart')->nullable();
            $table->date('PeriodeEnd')->nullable();
        });
    }
};
