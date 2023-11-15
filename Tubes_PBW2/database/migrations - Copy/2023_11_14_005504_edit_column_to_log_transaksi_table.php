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
        Schema::table('log_transaksi', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_penerimaan')->nullable();
            $table->unsignedBigInteger('id_penjualan')->nullable();
            $table->foreign('id_penerimaan')->references('id')->on('detail_penerimaan')->onDelete('cascade');
            $table->foreign('id_penjualan')->references('id')->on('penjualan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('log_transaksi', function (Blueprint $table) {
            //
            $table->dropForeign(['id_penerimaan']);
            $table->dropColumn('id_penerimaan');
            $table->dropForeign(['id_penjualan']);
            $table->dropColumn('id_penjualan');
        });
    }
};
