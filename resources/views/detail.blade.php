<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $produk->nama }}</title>

    <style>
        body{
            margin:0;
            padding:0;
            font-family:Arial;
            background:#eef3ff;
        }

        .container{
            max-width:1100px;
            margin:40px auto;
            background:white;
            border-radius:12px;
            padding:25px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);
        }

        .row{
            display:flex;
            gap:35px;
        }

        img{
            width:420px;
            height:350px;
            object-fit:cover;
            border-radius:12px;
        }

        .title{
            font-size:28px;
            font-weight:700;
            color:#0D47A1;
            margin-bottom:8px;
        }

        .price{
            font-size:23px;
            font-weight:700;
            color:#1b5e20;
        }

        .desc{
            margin-top:15px;
            font-size:16px;
            color:#333;
            line-height:1.6;
        }

        .btn-wa{
            margin-top:25px;
            background:#25D366;
            padding:12px 18px;
            border-radius:8px;
            color:white;
            font-size:18px;
            font-weight:bold;
            text-decoration:none;
            display:inline-block;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="row">

        <img src="{{ $produk->foto ? asset('produk/'.$produk->foto) : 'https://via.placeholder.com/420x350' }}">

        <div>
            <div class="title">{{ $produk->nama }}</div>

            <div class="price">
                Rp {{ number_format($produk->harga,0,',','.') }}
            </div>

            <div class="desc">
                {{ $produk->deskripsi ?? 'Tidak ada deskripsi.' }}
            </div>

            @php
                $wa = $produk->toko->kontak;
                $pesan = urlencode("Halo, saya ingin membeli produk *$produk->nama*.");
            @endphp

            <a href="https://wa.me/{{ $wa }}?text={{ $pesan }}" class="btn-wa" target="_blank">
                Hubungi via WhatsApp
            </a>
        </div>

    </div>

</div>

</body>
</html>
