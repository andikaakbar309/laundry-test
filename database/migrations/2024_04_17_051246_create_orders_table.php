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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('kode')->unique();
            $table->foreignId('konsumen_id');
            $table->foreignId('layanan_id');
            $table->string('status_pembayaran')->default('belum_lunas')->nullable(); // belum lunas, lunas
            $table->string('status')->default('proses')->nullable(); // proses, selesai, diambil
            $table->string('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
