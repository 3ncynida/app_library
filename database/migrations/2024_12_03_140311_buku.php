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
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id_buku');
            $table->string('judul', 70);
            $table->string('penerbit', 50);
            $table->date('tahun_terbit');
            $table->integer('stok');
            $table->text('detail')->nullable();
            $table->timestamps();
        });

        Schema::create('penulis', function (Blueprint $table) {
            $table->increments('id_penulis');
            $table->string('nama_penulis', 50);
            $table->timestamps();
        });

        Schema::create('buku_penulis', function (Blueprint $table) {
            $table->unsignedInteger('id_buku');
            $table->unsignedInteger('id_penulis');

            // Definisikan foreign key
            $table->foreign('id_buku')->references('id_buku')->on('buku')->onDelete('cascade');
            $table->foreign('id_penulis')->references('id_penulis')->on('penulis')->onDelete('cascade');

            // Jadikan kombinasi kolom sebagai primary key
            $table->primary(['id_buku', 'id_penulis']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel pivot terlebih dahulu
        Schema::dropIfExists('buku_penulis');
        Schema::dropIfExists('penulis');
        Schema::dropIfExists('buku');
    }
};
