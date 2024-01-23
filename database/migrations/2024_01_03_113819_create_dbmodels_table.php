<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->string('NIPD')->unique();
            $table->string('Kelas');
            $table->string('Jurusan');
            $table->string('No Absen')->unique();
            $table->string('Nama')->unique();
            $table->string('Jenis Kelamin');
            $table->string('UUID')->keys();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('dbmodels');
    }
};
