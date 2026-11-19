<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = [
        'id_service', 'jumlah_biaya', 'jenis_pembayaran', 'keterangan',
    ];

    public function daftarService()
    {
        return $this->belongsTo(DaftarService::class, 'id_service', 'id_service');
    }
}