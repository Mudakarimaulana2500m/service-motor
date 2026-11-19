
@extends('layouts.app')

@section('content')
@php
    $action = isset($item)
        ? route('pembayaran.update', $item->id_pembayaran)
        : route('pembayaran.store');
@endphp

<h4>{{ isset($item) ? 'Edit' : 'Tambah' }} Pembayaran Service</h4>

<form method="POST" action="{{ $action }}">
    @csrf

    @isset($item)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label class="form-label">Id Servis Pelanggan</label>

        @php
            $pilih = old('id_service', $item->id_service ?? '');
        @endphp

        <select name="id_service" class="form-select" required>
            <option value="">-- Pilih Id Servis --</option>

            @foreach ($service as $o)
                <option value="{{ $o->id_service }}"
                    @selected($pilih == $o->id_service)>
                    {{ $o->id_service.' - '.$o->no_plat }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Jumlah Biaya Servis</label>
        <input type="number" name="jumlah_biaya"
            class="form-control" min="0"
            value="{{ old('jumlah_biaya', $item->jumlah_biaya ?? '') }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label d-block">Jenis Pembayaran</label>

        @php
            $pilih = old('jenis_pembayaran', $item->jenis_pembayaran ?? '');
        @endphp

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio"
                name="jenis_pembayaran" id="jenis_pembayaran0"
                value="Cash / Tunai" required
                @checked($pilih == 'Cash / Tunai')>

            <label class="form-check-label"
                for="jenis_pembayaran0">Cash / Tunai</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio"
                name="jenis_pembayaran" id="jenis_pembayaran1"
                value="Non Tunai" required
                @checked($pilih == 'Non Tunai')>

            <label class="form-check-label"
                for="jenis_pembayaran1">Non Tunai</label>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control"
            rows="3">{{ old('keterangan', $item->keterangan ?? '') }}</textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>

    <a href="{{ route('pembayaran.index') }}"
       class="btn btn-secondary">Batal</a>
</form>
@endsection
