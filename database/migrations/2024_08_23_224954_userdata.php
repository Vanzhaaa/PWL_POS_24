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
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id'); // Primary key
            $table->string('username', 50)->unique(); // Username unik
            $table->string('nama', 100); // Nama pengguna
            $table->string('password'); // Password yang terenkripsi
            $table->unsignedBigInteger('level_id'); // Foreign key ke tabel levels
            $table->timestamps();

            // Relasi ke tabel levels
            $table->foreign('level_id')->references('level_id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
