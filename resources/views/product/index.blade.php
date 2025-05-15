@extends('layouts.admin')

@section('content')
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">➕ Tambah Produk</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                {{-- <th>Gambar</th> --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '-' }}</td>
                <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                {{-- <td>
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="60" alt="Image">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td> --}}
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf
                        {{-- @method('DELETE') --}}
                        <button class="btn btn-sm btn-danger">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada produk</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection