@extends('admin.sidebar')

@section('title','Dashboard')

@section('content')

<style>

    .dash-title{
        font-size:28px;
        font-weight:700;
        color:#1e40af;
        margin-bottom:25px;
    }

    .grid-box {
        display:grid;
        grid-template-columns: repeat(4,1fr);
        gap:20px;
        width:100%;
    }

    .card-stat{
        background:white;
        padding:25px;
        border-radius:14px;
        box-shadow:0 4px 12px rgba(0,0,0,0.07);
        transition:.25s;
    }

    .card-stat:hover{
        transform:translateY(-4px);
    }

    .card-stat i{
        font-size:36px;
    }

    .card-number{
        margin-top:15px;
        font-size:26px;
        font-weight:800;
        color:#1e293b;
    }

    .card-label{
        margin-top:4px;
        font-weight:600;
        color:#475569;
    }

</style>



<h2 class="dash-title">Dashboard</h2>

<div class="grid-box">

    <div class="card-stat">
        <i class="fa-solid fa-user" style="color:#1e40af;"></i>
        <div class="card-number">{{ $totalUser }}</div>
        <div class="card-label">Pengguna</div>
    </div>

    <div class="card-stat">
        <i class="fa-solid fa-store" style="color:#22c55e;"></i>
        <div class="card-number">{{ $totalToko }}</div>
        <div class="card-label">Total Toko</div>
    </div>

    <div class="card-stat">
        <i class="fa-solid fa-box" style="color:#ef4444;"></i>
        <div class="card-number">{{ $totalProduk }}</div>
        <div class="card-label">Total Produk</div>
    </div>

    <div class="card-stat">
        <i class="fa-solid fa-layer-group" style="color:#f59e0b;"></i>
        <div class="card-number">{{ $totalKategori }}</div>
        <div class="card-label">Kategori</div>
    </div>

</div>

@endsection
