@extends('themes.warungSoto.layouts.app')



@section('content')
    <div class="container py-5 mt-5" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body text-center p-4">
                        <h2 class="text-success fw-bold mb-3">
                            <i class="bx bx-check-circle" style="font-size: 2rem;"></i> Pembayaran Berhasil
                        </h2>
                        <p class="text-muted mb-4">Terima kasih telah melakukan pembayaran. Transaksi Anda sudah kami proses.
                        </p>

                        <a href="{{route('products.showProductsToUser') }}" class="btn btn-primary px-4">
                            <i class="bx bx-receipt"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
