
@extends('layouts.app')

@section('content')
@php
    $action = isset($item)
        ? route('data-service.update', $item->id_data_service)
        : route('data-service.store');
@endphp

<h4>{{ isset($item) ? 'Edit' : 'Tambah' }} Data Service</h4>

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

        <select name="id_service" id="id_service"
                class="form-select" required>
            <option value="">-- Pilih Id Servis --</option>

            @foreach ($service as $o)
                <option value="{{ $o->id_service }}"
                    data-keluhan="{{ $o->keluhan }}"
                    @selected($pilih == $o->id_service)>
                    {{ $o->id_service.' - '.$o->no_plat }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Keluhan Kendaraan</label>
        <textarea id="keluhan" class="form-control"
                  rows="2" readonly></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Estimasi Service</label>
        <input type="text" name="estimasi_service"
            class="form-control"
            value="{{ old('estimasi_service', $item->estimasi_service ?? '') }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Mekanik</label>
        <input type="text" name="nama_mekanik"
            class="form-control"
            value="{{ old('nama_mekanik', $item->nama_mekanik ?? '') }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Sparepart Pengganti</label>
        <input type="text" name="sparepart_pengganti"
            class="form-control"
            value="{{ old('sparepart_pengganti', $item->sparepart_pengganti ?? '') }}"
            required>
    </div>

    <button class="btn btn-primary">Simpan</button>

    <a href="{{ route('data-service.index') }}"
       class="btn btn-secondary">Batal</a>
</form>
@endsection

@push('scripts')
<script>
    const sumber = document.getElementById('id_service');
    const tujuan = document.getElementById('keluhan');

    function isiOtomatis() {
        const opt = sumber.options[sumber.selectedIndex];
        tujuan.value = opt ? (opt.dataset.keluhan || '') : '';
    }

    sumber.addEventListener('change', isiOtomatis);
    isiOtomatis();
</script>
@endpush
