@extends('themes.warungSoto.layouts.app')

@section('content')
    @include('themes.warungSoto.shared.slider')
    <!-- Popular -->
    <section class="popular">
        <div class="container">
                        @if (isset($query))
                <p>Hasil pencarian untuk: <strong>{{ $query }}</strong></p>
            @endif
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1>Popular</h1>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($popularProducts as $product)
                    <div class="col-lg-3 col-6">
                        <div class="card card-product card-body p-lg-4 p-3">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img-fluid">
                            </a>
                            <h3 class="product-name mt-3">{{ $product->name }}</h3>
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                            <div class="detail d-flex justify-content-between align-items-center mt-4">
                                <p class="price">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('products.show', $product->slug) }}" class="btn-cart">
                                    <i class="bx bx-cart-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $popularProducts->links() }}
            </div>
        </div>
    </section>

    <!-- Latest -->
    <section class="latest">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1>Latest</h1>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($latestProducts as $product)
                    <div class="col-lg-3 col-6">
                        <div class="card card-product card-body p-lg-4 p-3">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img-fluid">
                            </a>
                            <h3 class="product-name mt-3">{{ $product->name }}</h3>
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                            <div class="detail d-flex justify-content-between align-items-center mt-4">
                                <p class="price">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('products.show', $product->slug) }}" class="btn-cart">
                                    <i class="bx bx-cart-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $latestProducts->links() }}
            </div>
        </div>
    </section>

    <!-- Subscribe  -->
    {{-- <section class="subscribe">
        <div class="container">
            <div class="subscribe-wrapper" >
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6 col-md-7 col-10 col-sub">
                        <h1>Subscribe to get latest updates!</h1>
                        <form action="#" class="mt-5">
                            <div class="input-group w-100">
                                <input type="email" class="form-control" placeholder="Type your email ..">
                                <button class="btn btn-outline-warning">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
