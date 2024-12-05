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
        Schema::create('peminjaman_buku', function (Blueprint $table) {
            $table->increments('id_peminjaman'); // Primary key otomatis
            $table->unsignedInteger('id_buku'); // Relasi ke buku
            $table->unsignedInteger('user_id'); // Relasi ke tabel pengguna
            $table->date('tanggal_peminjaman'); // Tanggal peminjaman
            $table->date('tanggal_pengembalian')->nullable(); // Tanggal pengembalian
            $table->foreign('id_buku')->references('id_buku')->on('buku')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); // Misal ada tabel 'users'
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_buku');
    }
};
