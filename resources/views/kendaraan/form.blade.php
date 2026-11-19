@extends('layouts.app')

@section('content')

@php
    $action = isset($item)
        ? route('kendaraan.update', $item->id_kendaraan)
        : route('kendaraan.store');
@endphp

<h4>{{ isset($item) ? 'Edit' : 'Tambah' }} Data Kendaraan</h4>

<form method="POST" action="{{ $action }}">
    @csrf
    @isset($item)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label class="form-label">No Plat Kendaraan</label>
        <input type="text" name="no_plat" class="form-control"
            value="{{ old('no_plat', $item->no_plat ?? '') }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label d-block">Jenis Kendaraan</label>

        @php
            $pilih = old('jenis_kendaraan', $item->jenis_kendaraan ?? '');
        @endphp

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio"
                name="jenis_kendaraan" id="jenis_kendaraan0"
                value="Matic" required
                @checked($pilih == 'Matic')>
            <label class="form-check-label"
                for="jenis_kendaraan0">Matic</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio"
                name="jenis_kendaraan" id="jenis_kendaraan1"
                value="Manual Transmisi" required
                @checked($pilih == 'Manual Transmisi')>
            <label class="form-check-label"
                for="jenis_kendaraan1">Manual Transmisi</label>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">No STNK</label>
        <input type="text" name="no_stnk" class="form-control"
            value="{{ old('no_stnk', $item->no_stnk ?? '') }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tahun Pembuatan Kendaraan</label>
        <input type="number" name="tahun_pembuatan"
            class="form-control" min="1980" max="2100"
            value="{{ old('tahun_pembuatan', $item->tahun_pembuatan ?? '') }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Pemilik</label>
        <input type="text" name="nama_pemilik" class="form-control"
            value="{{ old('nama_pemilik', $item->nama_pemilik ?? '') }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Warna Kendaraan</label>
        <input type="text" name="warna" class="form-control"
            value="{{ old('warna', $item->warna ?? '') }}"
            required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('kendaraan.index') }}"
        class="btn btn-secondary">Batal</a>
</form>

@endsection