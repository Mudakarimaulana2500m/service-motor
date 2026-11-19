
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Pembayaran Service</h4>
    <a href="{{ route('pembayaran.create') }}"
       class="btn btn-primary">Tambah</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Id Servis</th>
            <th>Jumlah Biaya</th>
            <th>Jenis Pembayaran</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    @forelse ($data as $d)
        <tr>
            <td>{{ $d->id_pembayaran }}</td>
            <td>{{ $d->id_service }}</td>
            <td>Rp {{ number_format($d->jumlah_biaya, 0, ',', '.') }}</td>
            <td>{{ $d->jenis_pembayaran }}</td>
            <td>{{ $d->keterangan }}</td>
            <td>
                @include('layouts.aksi', [
                    'edit' => route('pembayaran.edit', $d->id_pembayaran),
                    'hapus' => route('pembayaran.destroy', $d->id_pembayaran),
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
