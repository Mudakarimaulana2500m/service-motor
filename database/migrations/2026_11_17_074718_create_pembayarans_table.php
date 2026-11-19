
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_service');
            $table->unsignedBigInteger('jumlah_biaya');
            $table->enum('jenis_pembayaran', ['Cash / Tunai', 'Non Tunai']);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_service')
                ->references('id_service')
                ->on('daftar_service')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
