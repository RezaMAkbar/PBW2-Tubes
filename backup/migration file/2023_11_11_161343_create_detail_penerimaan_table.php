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
        Schema::create('detail_penerimaan', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota');
            $table->string('username');
            $table->date('tanggal');
            $table->integer('harga_beli');
            $table->integer('total_harga');
            $table->unsignedBigInteger('id_obat')->index();
            $table->timestamps();

            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penerimaan');
    }
};
