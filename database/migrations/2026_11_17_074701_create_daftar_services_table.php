<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up(): void
{
    Schema::create('daftar_service', function (Blueprint $table) {
        $table->id('id_service');
        $table->string('no_plat', 15);
        $table->unsignedBigInteger('id_pelanggan');
        $table->text('keluhan');
        $table->date('tanggal_service');
        $table->timestamps();

        $table->foreign('no_plat')->references('no_plat')
              ->on('kendaraan')->cascadeOnUpdate()->cascadeOnDelete();
        $table->foreign('id_pelanggan')->references('id_pelanggan')
              ->on('pelanggan')->cascadeOnDelete();
    });
}

public function down(): void
    {
        Schema::dropIfExists('daftar_service');
    }
};