
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    .welcome-banner {
        background: linear-gradient(110deg, #071329, #173c70);
        color: white;
        border-radius: 18px;
        padding: 35px;
        position: relative;
        overflow: hidden;
        margin-bottom: 25px;
    }

    .welcome-banner h1 {
        font-size: 34px;
        font-weight: 800;
    }

    .welcome-banner h1 span {
        color: #ff9200;
    }

    .welcome-banner p {
        color: #d5e1f3;
    }

    .banner-icon {
        position: absolute;
        right: 45px;
        top: 15px;
        font-size: 130px;
        color: rgba(255,255,255,.12);
    }

    .stat-card {
        border: none;
        border-radius: 16px;
        padding: 22px;
        color: white;
        min-height: 135px;
        box-shadow: 0 5px 15px rgba(0,0,0,.08);
        margin-bottom: 20px;
    }

    .stat-card h3 {
        font-size: 30px;
        font-weight: 800;
        margin-top: 10px;
    }

    .stat-card i {
        font-size: 30px;
    }

    .blue { background: linear-gradient(120deg,#0755df,#3988ff); }
    .green { background: linear-gradient(120deg,#07944f,#27c77a); }
    .orange { background: linear-gradient(120deg,#f07800,#ffad32); }
    .purple { background: linear-gradient(120deg,#5423c9,#9b60ed); }
    .teal { background: linear-gradient(120deg,#078d8d,#24bdb2); }

    .dashboard-heading {
        font-weight: 800;
        margin-bottom: 18px;
    }

    .quick-card {
        background: white;
        border: 1px solid #e8edf5;
        border-radius: 15px;
        padding: 20px;
        height: 100%;
        transition: .2s;
    }

    .quick-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,.07);
    }

    .quick-card i {
        font-size: 28px;
        color: #ff8500;
    }

    .quick-card a {
        text-decoration: none;
        color: #17243b;
        font-weight: 700;
    }
</style>

<div class="welcome-banner">
    <i class="bi bi-motorcycle banner-icon"></i>

    <h5>SELAMAT DATANG DI</h5>

    <h1>Service <span>Motor</span></h1>

    <p>
        Solusi terbaik untuk perawatan kendaraan Anda.
        <br>
        Bersama kami, kendaraan selalu prima di setiap perjalanan!
    </p>

    <a href="{{ route('daftar-service.index') }}"
       class="btn btn-warning rounded-pill fw-bold px-4">
        Kelola Service
        <i class="bi bi-arrow-right"></i>
    </a>
</div>

<h5 class="dashboard-heading">
    <i class="bi bi-speedometer2 text-warning"></i>
    Ringkasan Data Bengkel
</h5>

<div class="row">

    <div class="col-md-6 col-xl-4">
        <div class="stat-card blue">
            <i class="bi bi-people-fill"></i>
            <div>Total Pelanggan</div>
            <h3>{{ $totalPelanggan }}</h3>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="stat-card green">
            <i class="bi bi-bicycle"></i>
            <div>Total Kendaraan</div>
            <h3>{{ $totalKendaraan }}</h3>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="stat-card orange">
            <i class="bi bi-clipboard-check"></i>
            <div>Total Daftar Service</div>
            <h3>{{ $totalDaftarService }}</h3>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="stat-card purple">
            <i class="bi bi-tools"></i>
            <div>Total Data Service</div>
            <h3>{{ $totalDataService }}</h3>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="stat-card teal">
            <i class="bi bi-wallet2"></i>
            <div>Total Pembayaran</div>
            <h3>{{ $totalPembayaran }}</h3>
        </div>
    </div>

</div>

<h5 class="dashboard-heading mt-3">
    <i class="bi bi-grid-fill text-warning"></i>
    Menu Pengelolaan
</h5>

<div class="row g-3">

    <div class="col-md-6 col-xl-4">
        <div class="quick-card">
            <i class="bi bi-people"></i>
            <h6 class="mt-3">Data Pelanggan</h6>
            <p class="text-muted small">Kelola informasi pelanggan bengkel.</p>
            <a href="{{ route('pelanggan.index') }}">Buka Menu →</a>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="quick-card">
            <i class="bi bi-bicycle"></i>
            <h6 class="mt-3">Data Kendaraan</h6>
            <p class="text-muted small">Kelola data kendaraan pelanggan.</p>
            <a href="{{ route('kendaraan.index') }}">Buka Menu →</a>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="quick-card">
            <i class="bi bi-clipboard-check"></i>
            <h6 class="mt-3">Daftar Service</h6>
            <p class="text-muted small">Kelola pendaftaran service motor.</p>
            <a href="{{ route('daftar-service.index') }}">Buka Menu →</a>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="quick-card">
            <i class="bi bi-tools"></i>
            <h6 class="mt-3">Data Service</h6>
            <p class="text-muted small">Kelola pengerjaan service motor.</p>
            <a href="{{ route('data-service.index') }}">Buka Menu →</a>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="quick-card">
            <i class="bi bi-wallet2"></i>
            <h6 class="mt-3">Pembayaran</h6>
            <p class="text-muted small">Kelola transaksi pembayaran service.</p>
            <a href="{{ route('pembayaran.index') }}">Buka Menu →</a>
        </div>
    </div>

</div>

@endsection
