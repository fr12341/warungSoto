<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    {{-- Font Awesome for icons (optional) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
            background-color: #228B22;
            color: white;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
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
        <h4 class="p-3 border-bottom">🛒 Warung Soto</h4>
        <a href="{{ url('admin/dashboard') }}">🏠 Dashboard</a>
        <a href="{{ url('/admin/products') }}">📦 Produk</a>
        <a href="{{ url('/admin/categories') }}">🗂 Kategori</a>
        <a href="{{ url('/admin/orders') }}">🧾 Pesanan</a>
        <a href="{{ url('/admin/customers') }}">👥 Pelanggan</a>
        <a href="{{ url('/admin/settings') }}">⚙️ Pengaturan</a>

    </div>

    {{-- Content --}}
    {{-- <div class="content" id="content">
        Top Bar
        <div class="topbar">
            <button class="btn btn-outline-secondary btn-sm d-md-none" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <div class="ms-auto fw-bold">👤 Admin</div>
        </div>

        <div class="mt-3">
            <h2>@yield('title')</h2>
            <hr>
            @yield('content')
        </div>
    </div> --}}

    <div class="content" id="content">
        {{-- Top Bar --}}
        <div class="topbar d-flex align-items-center justify-content-between px-3 py-2 border-bottom bg-light">
            <button class="btn btn-outline-secondary btn-sm d-md-none" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="ms-auto">
                @auth
                    <div class="dropdown">
                        <a id="navbarDropdown"
                            class="nav-link dropdown-toggle fw-semibold text-dark d-flex align-items-center gap-2"
                            href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
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
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Register</a>
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
