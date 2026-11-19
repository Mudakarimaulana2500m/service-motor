<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    private function rules(): array
    {
        return [
            'id_service' => 'required|exists:daftar_service,id_service',
            'estimasi_service' => 'required|max:100',
            'nama_mekanik' => 'required|max:100',
            'sparepart_pengganti' => 'required|max:255',
        ];
    }

    // data untuk dropdown Id Servis Pelanggan
    private function pilihan(): array
    {
        return ['service' => DaftarService::orderBy('id_service')->get()];
    }

    public function index()
    {
        $data = DataService::latest('id_data_service')->get();
        return view('data-service.index', compact('data'));
    }

    public function create()
    {
        return view('data-service.form', $this->pilihan());
    }

    public function store(Request $request)
    {
        DataService::create($request->validate($this->rules()));
        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil ditambahkan');
    }

    public function edit(DataService $data_service)
    {
        $data = $this->pilihan() + ['item' => $data_service];
        return view('data-service.form', $data);
    }

    public function update(Request $request, DataService $data_service)
    {
        $data_service->update(
            $request->validate($this->rules())
        );
        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil diperbarui');
    }

    public function destroy(DataService $data_service)
    {
        $data_service->delete();
        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil dihapus');
    }
}