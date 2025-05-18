@extends('themes.warungSoto.layouts.app')

@section('title', 'Checkout')

@section('content')
  <div class="container py-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 text-center">
                    <h4 class="mb-3">Konfirmasi Pembelian</h4>
                    <p class="text-muted">Anda akan membeli:</p>

                    <h5 class="fw-bold mb-1">{{ $product['name'] }}</h5>

                    <div class="mt-3 mb-2">
                        <p class="mb-1">Harga Satuan:</p>
                        <h6 class="text-primary">Rp{{ number_format($product['price'], 0, ',', '.') }}</h6>
                    </div>

                    <div class="mb-2">
                        <p class="mb-1">Total Harga ({{ $transaction['quantity'] }} barang):</p>
                        <h5 class="text-danger fw-bold">Rp{{ number_format($transaction['price'], 0, ',', '.') }}</h5>
                    </div>

                    <button type="button" class="btn btn-success btn-lg mt-3 px-5" id="pay-button">
                        <i class="bx bx-wallet"></i> Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                Anda akan melakukan pembelian produk <strong>{{ $product['name'] }}</strong> dengan harga
                <strong>Rp{{ number_format($product['price'], 0, ',', '.') }}</strong>
                <strong>Rp{{ number_format($transaction['price'], 0, ',', '.') }}</strong>
                <button type="button" class="btn btn-primary mt-3" id="pay-button">
                    Bayar Sekarang
                </button>
            </div>
        </div>
    </div> --}}
@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $transaction->snap_token }}', {
          // Optional
          onSuccess: function(result){
            window.location.href = '{{ route('checkout-success', $transaction->id) }}'
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
@endsection