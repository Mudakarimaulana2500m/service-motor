<?php

namespace App\Http\Controllers\Api;

use App\Models\Pelanggan;

class PelangganController extends BaseApiController
{
    protected string $model = Pelanggan::class;

    protected function rules($id = null): array
    {
        return [
            'nama_lengkap' => 'required|max:100',
            'no_hp' => 'required|max:20',
            'alamat' => 'required',
            'pekerjaan' => 'required|max:100',
        ];
    }
}
