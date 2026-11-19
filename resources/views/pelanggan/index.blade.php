@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Pelanggan</h4>
    <a href="{{ route('pelanggan.create') }}"
       class="btn btn-primary">Tambah</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id Pelanggan</th>
            <th>Nama Lengkap</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($data as $d)
        <tr>
            <td>{{ $d->id_pelanggan }}</td>
            <td>{{ $d->nama_lengkap }}</td>
            <td>{{ $d->no_hp }}</td>
            <td>{{ $d->alamat }}</td>
            <td>{{ $d->pekerjaan }}</td>
            <td>
                @include('layouts.aksi', [
                    'edit' => route('pelanggan.edit', $d->id_pelanggan),
                    'hapus' => route('pelanggan.destroy', $d->id_pelanggan),
                ])
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="text-center">Belum ada data</td></tr>
    @endforelse
    </tbody>
</table>
@endsection