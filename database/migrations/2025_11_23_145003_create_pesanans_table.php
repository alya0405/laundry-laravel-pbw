<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();

            // Relasi Pelanggan
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade');

            // Detail pesanan
            $table->string('layanan');
            $table->float('jumlah')->nullable();
            $table->float('harga');

            // Status
            $table->enum('status', [
                'Diterima',
                'Dicuci',
                'Dijemur',
                'Disetrika',
                'Selesai'
            ])->default('Diterima');

            // Tanggal
            $table->date('tanggal_masuk');
            $table->date('tanggal_selesai')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
