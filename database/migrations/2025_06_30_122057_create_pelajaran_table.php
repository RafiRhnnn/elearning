<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('kelas'); // nama kelas
            $table->string('pelajaran1')->nullable();
            $table->string('pelajaran2')->nullable();
            $table->string('pelajaran3')->nullable();
            $table->string('pelajaran4')->nullable();
            $table->string('pelajaran5')->nullable();
            $table->string('pelajaran6')->nullable();
            $table->string('pelajaran7')->nullable();
            $table->string('pelajaran8')->nullable();
            $table->string('pelajaran9')->nullable();
            $table->string('pelajaran10')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelajaran');
    }
};
