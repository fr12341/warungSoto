@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <h2 style="margin-bottom: 20px"><i class="bi bi-plus-square"></i> Tambah Produk Baru</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="category" class="fw-bold fs-8 mb-3">Kategori</label>
                        <select name="category" id="category" class="form-control">
                            <option disabled selected>---- Kategori Makanan ----</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="snack">Snack</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="name" class="fw-bold fs-8 mb-3">Nama Produk</label>
                        <input type="text" name="name" id="name" class="form-control" required placeholder="Nama Produk">
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="fw-bold fs-8 mb-3">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" required placeholder="Slug">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="fw-bold fs-8 mb-3">Harga</label>
                        <input type="number" name="price" id="price" class="form-control" required placeholder="Harga">
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="fw-bold fs-8 mb-3">Stok</label>
                        <input type="number" name="stock" id="stock" class="form-control" required placeholder="Stok">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="fw-bold fs-8 mb-3">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="fw-bold fs-8 mb-3">Gambar Produk</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    </div>

                    {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
                    <button type="submit" class="btn btn-success"><i class="bi bi-floppy-fill"></i>Simpan</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary"><i
                            class="bi bi-backspace-reverse-fill"></i>
                        Kembali</a>
                </form>
            </div>
        </div>
    @endsection
