
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_service', function (Blueprint $table) {
            $table->id('id_data_service');
            $table->unsignedBigInteger('id_service');
            $table->string('estimasi_service', 100);
            $table->string('nama_mekanik', 100);
            $table->string('sparepart_pengganti');
            $table->timestamps();

            $table->foreign('id_service')
                ->references('id_service')
                ->on('daftar_service')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_service');
    }
};
