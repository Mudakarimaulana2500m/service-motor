<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    private function rules(): array
    {
        return [
            'id_service' => 'required|exists:daftar_service,id_service',
            'jumlah_biaya' => 'required|integer|min:0',
            'jenis_pembayaran' => 'required|in:Cash / Tunai,Non Tunai',
            'keterangan' => 'nullable',
        ];
    }

    // data untuk dropdown Id Servis Pelanggan
    private function pilihan(): array
    {
        return ['service' => DaftarService::orderBy('id_service')->get()];
    }

    public function index()
    {
        $data = Pembayaran::latest('id_pembayaran')->get();
        return view('pembayaran.index', compact('data'));
    }

    public function create()
    {
        return view('pembayaran.form', $this->pilihan());
    }

    public function store(Request $request)
    {
        Pembayaran::create($request->validate($this->rules()));
        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil ditambahkan');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $data = $this->pilihan() + ['item' => $pembayaran];
        return view('pembayaran.form', $data);
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->update(
            $request->validate($this->rules())
        );
        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil diperbarui');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus');
    }
}