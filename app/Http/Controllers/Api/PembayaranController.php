<?php

namespace App\Http\Controllers\Api;

use App\Models\Pembayaran;

class PembayaranController extends BaseApiController
{
    protected string $model = Pembayaran::class;

    protected function rules($id = null): array
    {
        return [
            'id_service' => 'required|exists:daftar_service,id_service',
            'jumlah_biaya' => 'required|integer|min:0',
            'jenis_pembayaran' => 'required|in:Cash / Tunai,Non Tunai',
            'keterangan' => 'nullable',
        ];
    }
}
