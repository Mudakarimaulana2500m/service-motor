<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard') | Service Motor</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #0b1933;
            --navy-light: #14294b;
            --orange: #ff8500;
            --background: #f3f6fc;
            --text: #17243b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text);
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 255px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #10264a, #071329);
            color: white;
            padding: 25px 16px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            overflow-y: auto;
        }

        .brand {
            text-align: center;
            padding: 8px 0 30px;
        }

        .brand i {
            font-size: 48px;
            color: var(--orange);
        }

        .brand h4 {
            font-weight: 800;
            margin: 5px 0 0;
            letter-spacing: 1px;
        }

        .brand small {
            color: #b9c8df;
            font-size: 11px;
        }

        .menu-title {
            color: #8193b0;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin: 12px 12px;
        }

        .sidebar .nav-link {
            color: #dce5f3;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: .2s;
        }

        .sidebar .nav-link i {
            font-size: 19px;
            width: 23px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: linear-gradient(90deg, #ff7900, #ff9c16);
            color: white;
            box-shadow: 0 5px 15px rgba(255, 133, 0, .25);
        }

        .sidebar-footer {
            margin-top: auto;
            background: var(--navy-light);
            padding: 17px;
            border-radius: 15px;
            color: #dce5f3;
            font-size: 13px;
        }

        /* MAIN CONTENT */
        .main {
            margin-left: 255px;
            min-height: 100vh;
            padding: 25px 28px;
        }

        /* HEADER */
        .topbar {
            background: white;
            padding: 14px 20px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 15px rgba(20, 40, 80, .05);
            margin-bottom: 25px;
        }

        .search-box {
            background: #f3f6fc;
            border-radius: 30px;
            padding: 10px 16px;
            color: #77849a;
            width: 320px;
            font-size: 14px;
        }

        .admin-info {
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-icon {
            background: #eaf0ff;
            color: #17468b;
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            font-size: 20px;
        }

        /* CONTENT */
        .page-content {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(20, 40, 80, .05);
            min-height: 400px;
        }

        .alert {
            border-radius: 12px;
        }

        .btn-primary {
            background: var(--orange);
            border-color: var(--orange);
        }

        .btn-primary:hover {
            background: #e87500;
            border-color: #e87500;
        }

        .table {
            vertical-align: middle;
        }

        .table thead th {
            background: #edf2fa;
            color: #263b5b;
            white-space: nowrap;
        }

        .form-control,
        .form-select {
            border-radius: 9px;
            padding: 10px 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .sidebar {
                width: 75px;
                padding: 20px 9px;
            }

            .brand h4,
            .brand small,
            .sidebar .nav-link span,
            .menu-title,
            .sidebar-footer {
                display: none;
            }

            .brand i {
                font-size: 35px;
            }

            .sidebar .nav-link {
                justify-content: center;
                padding: 13px 5px;
            }

            .main {
                margin-left: 75px;
                padding: 15px;
            }

            .search-box {
                display: none;
            }

            .page-content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <i class="bi bi-gear-wide-connected"></i>
            <h4>SERVICE MOTOR</h4>
            <small>Cepat • Profesional • Terpercaya</small>
        </div>

        <div class="menu-title">MENU UTAMA</div>

        <nav>

            <a class="nav-link {{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}"
               href="{{ route('dashboard') }}">
                <i class="bi bi-house-door-fill"></i>
                <span>Dashboard</span>
            </a>

            <a class="nav-link {{ request()->is('pelanggan*') ? 'active' : '' }}"
               href="{{ route('pelanggan.index') }}">
                <i class="bi bi-people"></i>
                <span>Pelanggan</span>
            </a>

            <a class="nav-link {{ request()->is('kendaraan*') ? 'active' : '' }}"
               href="{{ route('kendaraan.index') }}">
                <i class="bi bi-bicycle"></i>
                <span>Kendaraan</span>
            </a>

            <a class="nav-link {{ request()->is('daftar-service*') ? 'active' : '' }}"
               href="{{ route('daftar-service.index') }}">
                <i class="bi bi-clipboard-check"></i>
                <span>Daftar Service</span>
            </a>

            <a class="nav-link {{ request()->is('data-service*') ? 'active' : '' }}"
               href="{{ route('data-service.index') }}">
                <i class="bi bi-tools"></i>
                <span>Data Service</span>
            </a>

            <a class="nav-link {{ request()->is('pembayaran*') ? 'active' : '' }}"
               href="{{ route('pembayaran.index') }}">
                <i class="bi bi-wallet2"></i>
                <span>Pembayaran</span>
            </a>

        </nav>

        <div class="sidebar-footer">
            <i class="bi bi-headset fs-4"></i>
            <div class="fw-bold mt-2">Butuh Bantuan?</div>
            <small>Hubungi Admin Bengkel</small>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- HEADER -->
        <header class="topbar">

            <div class="search-box">
                <i class="bi bi-search me-2"></i>
                Cari data di sini...
            </div>

            <div class="admin-info">

                <i class="bi bi-bell fs-5 me-2"></i>

                <div class="admin-icon">
                    <i class="bi bi-person-fill"></i>
                </div>

                Admin

            </div>

        </header>

        <!-- SUCCESS MESSAGE -->
        @if (session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR MESSAGE -->
        @if ($errors->any())
            <div class="alert alert-danger">

                <strong>Periksa kembali data yang dimasukkan:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <!-- PAGE CONTENT -->
        <section class="page-content">
            @yield('content')
        </section>

    </main>

    @stack('scripts')

</body>
</html>
