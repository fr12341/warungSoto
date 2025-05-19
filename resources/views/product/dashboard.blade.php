@extends('layouts.admin')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 fw-bold"><i class="bi bi-speedometer2"></i> Dashboard Admin</h2>

        <div class="row g-4 mb-4">
            <!-- Total Produk -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-box-seam"></i> Total Produk</h5>
                        <h3 class="fw-bold">{{ $totalProducts }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Stok -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-database"></i> Total Stok</h5>
                        <h3 class="fw-bold">{{ $totalStock }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Kategori -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-tags-fill"></i> Kategori</h5>
                        <ul class="list-unstyled mb-0">
                            @foreach ($categoryCounts as $category => $count)
                                <li><strong>{{ ucfirst($category) }}</strong>: {{ $count }} produk</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Akses Cepat -->
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-box-arrow-in-right"></i> Kelola Produk
            </a>
            <a href="{{ route('products.create') }}" class="btn btn-outline-success">
                <i class="bi bi-plus-circle"></i> Tambah Produk Baru
            </a>
        </div>

        <!-- Statistik Penjualan Opsional -->
        {{-- <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title fw-bold"><i class="bi bi-bar-chart-line"></i> Statistik Penjualan Bulanan</h5>
                <canvas id="salesChart" height="100"></canvas>
            </div>
        </div> --}}
    </div>
    
@endsection
