<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    public function index()
    {
        $data = DaftarService::with(['kendaraan', 'pelanggan'])
            ->latest('id_service')
            ->get();

        return view('daftar-service.index', compact('data'));
    }

    public function create()
    {
        $kendaraan = Kendaraan::all();
        $pelanggan = Pelanggan::all();

        return view('daftar-service.form', compact('kendaraan', 'pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_plat' => 'required|exists:kendaraan,no_plat',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'keluhan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        DaftarService::create($request->only([
            'no_plat',
            'id_pelanggan',
            'keluhan',
            'tanggal_service',
        ]));

        return redirect()->route('daftar-service.index')
            ->with('success', 'Daftar service berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = DaftarService::findOrFail($id);
        $kendaraan = Kendaraan::all();
        $pelanggan = Pelanggan::all();

        return view('daftar-service.form', compact(
            'item', 'kendaraan', 'pelanggan'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_plat' => 'required|exists:kendaraan,no_plat',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'keluhan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        $item = DaftarService::findOrFail($id);

        $item->update($request->only([
            'no_plat',
            'id_pelanggan',
            'keluhan',
            'tanggal_service',
        ]));

        return redirect()->route('daftar-service.index')
            ->with('success', 'Data daftar service berhasil diperbarui');
    }

    public function destroy($id)
    {
        $item = DaftarService::findOrFail($id);
        $item->delete();

        return redirect()->route('daftar-service.index')
            ->with('success', 'Data daftar service berhasil dihapus');
    }
}