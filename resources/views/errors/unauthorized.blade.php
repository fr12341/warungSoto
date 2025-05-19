@extends('themes.warungSoto.layouts.app')

@section('content')
    <main class="py-5 mt-5">
        <div class="container text-center mt-5">
            <h1 class="text-danger">Akses Ditolak</h1>
            <p class="mt-3">Anda bukan admin dan tidak memiliki izin untuk mengakses halaman ini.</p>
            <a href="{{ url('/') }}" class="btn btn-primary mt-4">Kembali ke Beranda</a>
        </div>
    </main>
@endsection
