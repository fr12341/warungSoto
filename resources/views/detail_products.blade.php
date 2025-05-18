@extends('themes.warungSoto.layouts.app')

@section('content')
    <section class="main-content" style="padding-top: 140px;">
        <div class="container">
            <div class="row">
                <!-- Gambar Produk -->
                <div class="col-md-6">
                    <div id="product-images" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/' . $detail_product->image) }}"
                                    alt="{{ $detail_product->name }}" class="img-fluid rounded shadow w-75 mx-auto d-block">
                            </div>
                            {{-- Jika nanti ada multiple images, tinggal tambahkan carousel-item lainnya --}}
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#product-images"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#product-images"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Detail Produk -->
                <div class="col-md-6">
                    <div class="product-detail mt-5 mt-md-0">
                        <h1 class="mb-1">{{ $detail_product->name }}</h1>
                        <div class="mb-3 rating">
                            <small class="text-warning">
                                <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i
                                    class="bx bxs-star"></i><i class="bx bxs-star-half"></i>
                            </small>
                            <a href="#" class="ms-2">(30 reviews)</a>
                        </div>
                        <div class="price mb-3">
                            <span class="active-price text-dark">IDR
                                {{ number_format($detail_product->price, 0, ',', '.') }}</span>
                            @if ($detail_product->old_price)
                                <span
                                    class="text-decoration-line-through text-muted ms-1">{{ number_format($detail_product->old_price, 0, ',', '.') }}</span>
                                <span><small class="discount-percent ms-2 text-danger">Diskon!</small></span>
                            @endif
                        </div>

                        <hr class="my-4">

                        @if ($detail_product->stock > 0)
                            <form action="{{ route('checkout-process') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $detail_product->id }}">
                                <input type="hidden" name="price" value="{{ $detail_product->price }}">

                                <div class="row g-2 align-items-center">
                                    <div class="col-3">
                                        <input type="number" name="quantity" class="form-control" value="1"
                                            min="1" max="{{ $detail_product->stock }}">
                                    </div>
                                    <div class="col-6 d-grid">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="bx bx-cart-alt"></i> Beli Sekarang
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <a class="btn btn-light" href="#"><i class="bx bx-heart"></i></a>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-danger">Stok habis</div>
                        @endif


                        <hr class="my-4">

                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>SKU:</td>
                                    <td>{{ $detail_product->sku ?? 'Tidak tersedia' }}</td>
                                </tr>
                                <tr>
                                    <td>Stok:</td>
                                    <td>{{ $detail_product->stock }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori:</td>
                                    <td>{{ $detail_product->category->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Pengiriman:</td>
                                    <td><small>1 hari. <span class="text-muted">(Free pickup tersedia)</span></small></td>
                                </tr>
                            </tbody>
                        </table>

                        <hr class="my-4">

                        <div class="product-share">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><i class="bx bxl-facebook-circle"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="bx bxl-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="bx bxl-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Produk dan Tab -->
            <div class="row">
                <div class="product-description pt-5">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-details-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-details" type="button" role="tab">Details</button>
                            <button class="nav-link" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews"
                                type="button" role="tab">Reviews</button>
                        </div>
                    </nav>
                    <div class="tab-content p-3">
                        <div class="tab-pane fade show active" id="nav-details" role="tabpanel">
                            <h4 class="mb-3">Deskripsi Produk</h4>
                            <p>{{ $detail_product->description }}</p>
                        </div>
                        <div class="tab-pane fade" id="nav-reviews" role="tabpanel">
                            <h4 class="mb-3">Tulis Ulasan</h4>
                            <form>
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Ulasan</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
