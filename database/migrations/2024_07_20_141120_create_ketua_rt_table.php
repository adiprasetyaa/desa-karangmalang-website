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
        Schema::create('ketua_rt', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->date('TTL'); // Assuming TTL is a date field for Date of Birth
            $table->string('Alamat');
            $table->string('Jabatan');
            $table->string('NoHandphone');
            $table->date('PeriodeStart'); // Start date of the term
            $table->date('PeriodeEnd'); // End date of the term
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketua_rt');
    }
};
