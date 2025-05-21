<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #198754;
            /* Bootstrap bg-success */
            color: white;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #157347;
            /* darker green on hover */
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .content.full {
            margin-left: 0;
        }

        .topbar {
            height: 60px;
            background: #f8f9fa;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    {{-- Sidebar --}}
    <div class="sidebar" id="sidebar">
        <h4 class="p-3 border-bottom text-center d-flex flex-column align-items-center">
            <i class="bi bi-shop fs-2 mb-1"></i>
            <span class="fs-5">Warung Soto</span>
        </h4>

        <a href="{{ url('admin/dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        <a href="{{ url('/admin/products') }}"><i class="bi bi-box-seam me-2"></i>Produk</a>
        <a href="{{ url('/admin/transactions') }}"><i class="bi bi-people me-2"></i>Pelanggan</a>
        <a href="{{ url('/admin/settings') }}"><i class="bi bi-gear me-2"></i>Pengaturan</a>
    </div>

    {{-- Content --}}
    <div class="content" id="content">
        {{-- Top Bar --}}
        <div class="topbar d-flex align-items-center justify-content-between px-3 py-2 border-bottom bg-light">
            <button class="btn btn-outline-success btn-sm d-md-none" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>

            <div class="ms-auto">
                @auth
                    <div class="dropdown">
                        <a id="navbarDropdown"
                            class="nav-link dropdown-toggle fw-semibold text-dark d-flex align-items-center gap-2"
                            href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=198754&color=fff"
                                alt="avatar" class="rounded-circle" width="32" height="32">
                            <span>{{ Auth::user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end shadow rounded-3" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item d-flex align-items-center gap-2 text-danger fw-semibold"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right fs-5"></i> Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <div>
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-success">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-success">Register</a>
                    </div>
                @endauth
            </div>
        </div>

        {{-- Content Section --}}
        <div class="mt-3 px-3">
            <h2>@yield('title')</h2>
            <hr>
            @yield('content')
        </div>
    </div>

    {{-- JS for toggling sidebar --}}
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('show');
            content.classList.toggle('full');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
