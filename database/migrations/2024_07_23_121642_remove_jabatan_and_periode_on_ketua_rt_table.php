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
        // remove periodestart and end
        Schema::table('ketua_rt', function (Blueprint $table) {
            $table->dropColumn('Jabatan');
            $table->dropColumn('PeriodeStart');
            $table->dropColumn('PeriodeEnd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketua_rt', function (Blueprint $table) {
            $table->string('Jabatan');
            $table->date('PeriodeStart')->nullable();;
            $table->date('PeriodeEnd')->nullable();;
        });
    }
};
