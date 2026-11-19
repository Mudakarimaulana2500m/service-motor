
<?php

use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;

use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\Pembayaran;

use Illuminate\Support\Facades\Route;

// Halaman utama menuju Dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Halaman Dashboard
Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalPelanggan' => Pelanggan::count(),
        'totalKendaraan' => Kendaraan::count(),
        'totalDaftarService' => DaftarService::count(),
        'totalDataService' => DataService::count(),
        'totalPembayaran' => Pembayaran::count(),
    ]);
})->name('dashboard');

// Menu Pengelolaan
Route::resource('pelanggan', PelangganController::class)->except('show');

Route::resource('kendaraan', KendaraanController::class)->except('show');

Route::resource('daftar-service', DaftarServiceController::class)->except('show');

Route::resource('data-service', DataServiceController::class)->except('show');

Route::resource('pembayaran', PembayaranController::class)->except('show');
