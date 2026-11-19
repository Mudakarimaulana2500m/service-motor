@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Kendaraan</h4>
    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">
        Tambah Kendaraan
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Kendaraan</th>
            <th>No Plat</th>
            <th>Jenis Kendaraan</th>
            <th>No STNK</th>
            <th>Tahun Pembuatan</th>
            <th>Nama Pemilik</th>
            <th>Warna</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $d)
        <tr>
            <td>{{ $d->id_kendaraan }}</td>
            <td>{{ $d->no_plat }}</td>
            <td>{{ $d->jenis_kendaraan }}</td>
            <td>{{ $d->no_stnk }}</td>
            <td>{{ $d->tahun_pembuatan }}</td>
            <td>{{ $d->nama_pemilik }}</td>
            <td>{{ $d->warna }}</td>
            <td>
                @include('layouts.aksi', [
                    'edit' => route('kendaraan.edit', $d->id_kendaraan),
                    'hapus' => route('kendaraan.destroy', $d->id_kendaraan),
                ])
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada data kendaraan</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection