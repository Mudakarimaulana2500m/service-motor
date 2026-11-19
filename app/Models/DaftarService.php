<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    protected $table = 'daftar_service';

    protected $primaryKey = 'id_service';

    protected $fillable = [
        'no_plat',
        'id_pelanggan',
        'keluhan',
        'tanggal_service',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(
            Kendaraan::class,
            'no_plat',
            'no_plat'
        );
    }

    public function pelanggan()
    {
        return $this->belongsTo(
            Pelanggan::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }
}
