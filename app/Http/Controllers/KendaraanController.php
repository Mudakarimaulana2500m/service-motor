<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KendaraanController extends Controller
{
    private function rules($id = null): array
    {
        return [
            'no_plat' => [
                'required',
                'max:15',
                Rule::unique('kendaraan', 'no_plat')->ignore($id, 'id_kendaraan')
            ],
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|max:30',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik' => 'required|max:100',
            'warna' => 'required|max:30',
        ];
    }

    public function index()
    {
        $data = Kendaraan::latest('id_kendaraan')->get();
        return view('kendaraan.index', compact('data'));
    }

    public function create()
    {
        return view('kendaraan.form');
    }

    public function store(Request $request)
    {
        Kendaraan::create($request->validate($this->rules()));

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan');
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.form', ['item' => $kendaraan]);
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $kendaraan->update(
            $request->validate($this->rules($kendaraan->id_kendaraan))
        );

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus');
    }
}