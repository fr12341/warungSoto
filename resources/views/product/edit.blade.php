@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <h2 class="mb-4"><i class="bi bi-pencil-square"></i> Edit Produk</h2>

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="fw-bold fs-8 mb-3" class="fw-bold fs-8 mb-3">Nama Produk</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $product->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="fw-bold fs-8 mb-3">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                            value="{{ old('slug', $product->slug) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="fw-bold fs-8 mb-3">Kategori</label>
                        <select name="category" id="category" class="form-select" required>
                            @foreach (['makanan', 'minuman', 'snack'] as $category)
                                <option value="{{ $category }}"
                                    {{ $product->category === $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="price" class="fw-bold fs-8 mb-3">Harga</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="{{ old('price', $product->price) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="fw-bold fs-8 mb-3">Stok</label>
                        <input type="number" name="stock" id="stock" class="form-control"
                            value="{{ old('stock', $product->stock) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="fw-bold fs-8 mb-3">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="fw-bold fs-8 mb-3">Gambar Produk</label><br>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mb-2"><br>
                        @endif
                        <input type="file" name="image" id="image" class="form-control">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>

                    <button type="submit" class="btn btn-success"><i class="bi bi-floppy-fill"></i> Simpan
                        Perubahan</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary"><i
                            class="bi bi-backspace-reverse-fill"></i>
                        Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
