<?php

namespace App\Http\Controllers\Api;

use App\Models\Kendaraan;
use Illuminate\Validation\Rule;

class KendaraanController extends BaseApiController
{
    protected string $model = Kendaraan::class;

    protected function rules($id = null): array
    {
        return [
            'no_plat' => [
                'required',
                'max:15',
                Rule::unique('kendaraan', 'no_plat')
                    ->ignore($id, 'id_kendaraan')
            ],
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|max:30',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik' => 'required|max:100',
            'warna' => 'required|max:30',
        ];
    }
}
