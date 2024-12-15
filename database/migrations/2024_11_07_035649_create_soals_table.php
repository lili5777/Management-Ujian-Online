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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kelas')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('id_mapelkelas')->constrained('mapel_kelas')->onDelete('cascade');
            $table->foreignId('id_jadwal')->constrained('jadwals')->onDelete('cascade');
            $table->text('pertanyaan');
            $table->string('kunci', 1);
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
