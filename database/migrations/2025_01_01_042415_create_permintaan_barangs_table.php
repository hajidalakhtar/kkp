<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permintaan_barang', function (Blueprint $table) {
            $table->id();
            $table->string("nama_karyawan");
            $table->foreignId('id_barang')->constrained('produks');
            $table->integer('jumlah');
            $table->string('status')->default('pending');
            $table->text('deskripsi');
            $table->string('no_form');
            $table->date('tanggal');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_barangs');
    }
};
