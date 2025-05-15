<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
            background-color: #343a40;
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
        <a href="{{ url('/admin') }}">🏠 Dashboard</a>
        <a href="{{ url('/admin/products') }}">📦 Produk</a>
        <a href="{{ url('/admin/categories') }}">🗂 Kategori</a>
        <a href="{{ url('/admin/orders') }}">🧾 Pesanan</a>
        <a href="{{ url('/admin/customers') }}">👥 Pelanggan</a>
        <a href="{{ url('/admin/settings') }}">⚙️ Pengaturan</a>
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm w-100">🚪 Logout</button>
        </form>
    </div>

    {{-- Content --}}
    <div class="content" id="content">
        {{-- Top Bar --}}
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
</body>
</html>
