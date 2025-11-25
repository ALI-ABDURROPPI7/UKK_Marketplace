@extends('home')

@section('content')

<div class="kategori-container">

    <div class="kategori-title">
        Produk Berdasarkan Kategori
    </div>

    <div style="display:flex; flex-wrap:wrap; gap:20px;">
        @foreach($products as $p)
        <div style="
            width:210px;
            background:white;
            border-radius:12px;
            box-shadow:0 4px 10px rgba(0,0,0,.08);
            padding:15px;
            text-align:center;
        ">

            <img src="{{ $p->foto ? asset('produk/'.$p->foto) : 'https://via.placeholder.com/200' }}"
                 style="width:100%;height:140px;object-fit:cover;border-radius:10px;">

            <div style="margin-top:10px;font-weight:bold;">
                {{ $p->nama }}
            </div>

            <div style="color:#1E88E5;font-weight:bold;margin-top:5px;">
                Rp {{ number_format($p->harga,0,',','.') }}
            </div>

        </div>
        @endforeach
    </div>

</div>

@endsection
