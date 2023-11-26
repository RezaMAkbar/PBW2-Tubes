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
        //
        Schema::table('stok_opname', function (Blueprint $table) {
            $table->string('tempat_simpan')->nullable()->change();
            $table->date('tanggal_simpan')->nullable()->change();
            $table->integer('sisa_stock')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('stok_opname', function (Blueprint $table) {
            $table->string('tempat_simpan')->nullable(false)->change();
            $table->date('tanggal_simpan')->nullable(false)->change();
            $table->integer('sisa_stock')->nullable(false)->change();
        });
    }
};
