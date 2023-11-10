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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penjualan')->index();
            $table->unsignedBigInteger('id_obat')->index();
            $table->integer('total_barang');
            $table->integer('subtotal');
            $table->timestamps();

            $table->foreign('id_penjualan')->references('id')->on('penjualan')->onDelete('cascade');
            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
