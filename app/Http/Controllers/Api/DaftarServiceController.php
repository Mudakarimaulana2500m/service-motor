<?php

namespace App\Http\Controllers\Api;

use App\Models\DaftarService;

class DaftarServiceController extends BaseApiController
{
    protected string $model = DaftarService::class;

    protected function rules($id = null): array
    {
        return [
            'no_plat' => 'required|exists:kendaraan,no_plat',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'keluhan' => 'required',
            'tanggal_service' => 'required|date',
        ];
    }
}
