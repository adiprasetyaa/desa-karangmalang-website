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
        Schema::create('layanan_publik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_layanan'); // Contoh: KTP, KK, Akta Kelahiran
            $table->text('deskripsi_layanan'); // Deskripsi layanan
            $table->text('persyaratan'); // Persyaratan yang diperlukan
            // $table->string('status')->default('aktif'); // Status layanan (aktif/nonaktif)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_publik');
    }
};
