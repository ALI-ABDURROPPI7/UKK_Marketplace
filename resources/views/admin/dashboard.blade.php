@extends('admin.sidebar')

@section('content')

<h2 style="font-size: 28px; font-weight: bold; margin-bottom: 25px; text-align:left;">
    Dashboard
</h2>

<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; width:100%;">

    <!-- Total User -->
    <div style="background:white; padding:25px; border-radius:12px; box-shadow:0 3px 8px rgba(0,0,0,0.1); text-align:left;">
        <i class="fa-solid fa-user" style="font-size:32px; color:#1e88e5;"></i>
        <h3 style="margin-top:15px; font-size:22px; font-weight:600;">{{ $totalUser }}</h3>
        <p style="color:#555;">Pengguna</p>
    </div>

    <!-- Total Toko -->
    <div style="background:white; padding:25px; border-radius:12px; box-shadow:0 3px 8px rgba(0,0,0,0.1); text-align:left;">
        <i class="fa-solid fa-store" style="font-size:32px; color:#43a047;"></i>
        <h3 style="margin-top:15px; font-size:22px; font-weight:600;">{{ $totalToko }}</h3>
        <p style="color:#555;">Total Toko</p>
    </div>

    <!-- Total Produk -->
    <div style="background:white; padding:25px; border-radius:12px; box-shadow:0 3px 8px rgba(0,0,0,0.1); text-align:left;">
        <i class="fa-solid fa-box" style="font-size:32px; color:#e53935;"></i>
        <h3 style="margin-top:15px; font-size:22px; font-weight:600;">{{ $totalProduk }}</h3>
        <p style="color:#555;">Total Produk</p>
    </div>

    <!-- Total Kategori -->
    <div style="background:white; padding:25px; border-radius:12px; box-shadow:0 3px 8px rgba(0,0,0,0.1); text-align:left;">
        <i class="fa-solid fa-layer-group" style="font-size:32px; color:#fb8c00;"></i>
        <h3 style="margin-top:15px; font-size:22px; font-weight:600;">{{ $totalKategori }}</h3>
        <p style="color:#555;">Kategori</p>
    </div>

</div>

@endsection
