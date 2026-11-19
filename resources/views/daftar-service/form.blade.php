@extends('layouts.app')

@section('content')

@php
    $action = isset($item)
        ? route('daftar-service.update', $item->id_service)
        : route('daftar-service.store');
@endphp

<h4>{{ isset($item) ? 'Edit' : 'Tambah' }} Daftar Service</h4>

<form method="POST" action="{{ $action }}">
    @csrf

    @isset($item)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label class="form-label">Nomor Plat Kendaraan</label>
        <select name="no_plat" id="no_plat" class="form-select" required>
            <option value="">-- Pilih Kendaraan --</option>

            @foreach ($kendaraan as $k)
                <option value="{{ $k->no_plat }}"
                    @selected(old('no_plat', $item->no_plat ?? '') == $k->no_plat)>
                    {{ $k->no_plat }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Pelanggan</label>
        <select name="id_pelanggan" id="id_pelanggan"
            class="form-select" required>
            <option value="">-- Pilih Pelanggan --</option>

            @foreach ($pelanggan as $p)
                <option value="{{ $p->id_pelanggan }}"
                    @selected(old('id_pelanggan', $item->id_pelanggan ?? '') == $p->id_pelanggan)>
                    {{ $p->nama_lengkap }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Keluhan</label>
        <textarea name="keluhan" class="form-control" rows="3"
            required>{{ old('keluhan', $item->keluhan ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Service</label>
        <input type="date" name="tanggal_service" class="form-control"
            value="{{ old('tanggal_service', isset($item) ? $item->tanggal_service : '') }}"
            required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('daftar-service.index') }}"
       class="btn btn-secondary">Batal</a>
</form>

@endsection