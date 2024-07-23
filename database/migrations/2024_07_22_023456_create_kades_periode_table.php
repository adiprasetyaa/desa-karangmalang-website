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
        Schema::create('kades_periode', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kades_id')->constrained('kades')->onDelete('cascade');
            $table->foreignId('periode_id')->constrained('periode')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kades_periode');
    }
};
