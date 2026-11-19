@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Daftar Service</h4>
    <a href="{{ route('daftar-service.create') }}"
       class="btn btn-primary">Tambah Daftar Service</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Service</th>
            <th>No Plat</th>
            <th>Nama Pelanggan</th>
            <th>Keluhan</th>
            <th>Tanggal Service</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $d)
        <tr>
            <td>{{ $d->id_service }}</td>
            <td>{{ $d->no_plat }}</td>
            <td>{{ $d->pelanggan->nama_lengkap ?? '-' }}</td>
            <td>{{ $d->keluhan }}</td>
            <td>{{ $d->tanggal_service }}</td>
            <td>
                @include('layouts.aksi', [
                    'edit' => route('daftar-service.edit', $d->id_service),
                    'hapus' => route('daftar-service.destroy', $d->id_service),
                ])
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">
                Belum ada daftar service
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection