
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Service</h4>
    <a href="{{ route('data-service.create') }}"
       class="btn btn-primary">Tambah</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Id Servis</th>
            <th>Estimasi</th>
            <th>Nama Mekanik</th>
            <th>Sparepart Pengganti</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    @forelse ($data as $d)
        <tr>
            <td>{{ $d->id_data_service }}</td>
            <td>{{ $d->id_service }}</td>
            <td>{{ $d->estimasi_service }}</td>
            <td>{{ $d->nama_mekanik }}</td>
            <td>{{ $d->sparepart_pengganti }}</td>
            <td>
                @include('layouts.aksi', [
                    'edit' => route('data-service.edit', $d->id_data_service),
                    'hapus' => route('data-service.destroy', $d->id_data_service),
                ])
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
