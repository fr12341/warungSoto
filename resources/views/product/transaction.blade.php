@extends('layouts.admin')
@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Data Transaksi Pelanggan</h3>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $trx)
                    <tr>
                        <td>{{ $trx->user->name }}</td>
                        <td>{{ $trx->product->name ?? 'Produk tidak ditemukan' }}</td>
                        <td>IDR {{ number_format($trx->price, 0, ',', '.') }}</td>
                        <td>{{ $trx->quantity }}</td>
                        <td>
                            <span
                                class="badge 
                            @if ($trx->status == 'pending') bg-warning
                            @elseif($trx->status == 'success') bg-success
                            @elseif($trx->status == 'failed') bg-danger @endif">
                                {{ ucfirst($trx->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
