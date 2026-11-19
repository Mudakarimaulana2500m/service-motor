<?php

namespace App\Http\Controllers\Api;

use App\Models\DataService;

class DataServiceController extends BaseApiController
{
    protected string $model = DataService::class;

    protected function rules($id = null): array
    {
        return [
            'id_service' => 'required|exists:daftar_service,id_service',
            'estimasi_service' => 'required|max:100',
            'nama_mekanik' => 'required|max:100',
            'sparepart_pengganti' => 'required|max:255',
        ];
    }
}
