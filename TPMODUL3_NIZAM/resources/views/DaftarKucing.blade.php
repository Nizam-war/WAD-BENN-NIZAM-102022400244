@extends('layouts.dashboard')

@section('title', 'Daftar Kucing')

@section('content')
    <div class="text-center mb-4">
        <h1 class="cat-title">🐾 Daftar Kucing Peliharaan 🐾</h1>
        <p class="cat-subtitle">Klik nama kucing untuk melihat detailnya</p>
    </div>

    <div class="row justify-content-center">
        <!--1. Buat perulangan foreach untuk menampung informasi setiap kucing-->
        @foreach ($kucing as $item)
        <div class="col-md-4 mb-3">
            <div class="cat-card text-center">
                <h4>{{ $item->nama_kucing }}</h4> <!--2. Menampilkan nama kucing -->
                <p class="text-muted">{{ $item->ras }}</p> <!--3. Menampilkan ras -->
                <!--4. Arahkan tombol ke halaman detail kucing sesuai ID -->
                <a href="{{ route('detail.kucing', $item->id) }}" class="btn btn-custom btn-sm">Lihat Detail</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
