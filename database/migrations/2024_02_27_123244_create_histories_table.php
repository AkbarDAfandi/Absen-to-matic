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
        Schema::create('history', function (Blueprint $table) {
            $table->id('noUrut');
            $table->string('NIPD')->unique();
            $table->string('Kelas');
            $table->string('Jurusan');
            $table->string('No Absen')->unique();
            $table->string('Nama')->unique();
            $table->string('Jenis Kelamin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
