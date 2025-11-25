<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Marketplace Sekolah</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin:0;
            padding:0;
            font-family: Poppins, Arial;
            background:#f4f7ff;
        }

        /* NAVBAR */
        nav{
            background:#0D47A1;
            padding:18px 60px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            color:white;
        }

        nav .logo{
            font-size:22px;
            font-weight:700;
        }

        nav a{
            color:white;
            font-weight:bold;
            padding:9px 16px;
            text-decoration:none;
            border-radius:6px;
            transition:.2s;
        }

        nav a:hover{
            background:#1565C0;
        }

        /* HERO */
        .hero{
            padding:90px 30px;
            text-align:center;
            background:#0D47A1;
            color:white;
        }

        .hero h1{
            font-size:36px;
            margin-bottom:12px;
        }

        .hero p{
            opacity:.9;
            font-size:17px;
        }

        .btn-login{
            margin-top:22px;
            background:white;
            color:#0D47A1;
            padding:11px 18px;
            text-decoration:none;
            border-radius:6px;
            font-weight:bold;
            display:inline-block;
        }

        /* KATEGORI */
        .kategori-container{
            padding:45px;
            max-width:1100px;
            margin:auto;
        }

        .kategori-title,
        .product-title{
            font-size:24px;
            font-weight:bold;
            margin-bottom:20px;
            color:#0D47A1;
        }

        .kategori-list,
        .produk-list{
            display:flex;
            gap:15px;
        }

        .kategori-item{
            background:white;
            padding:20px;
            width:130px;
            border-radius:12px;
            text-align:center;
            box-shadow:0 4px 12px rgba(0,0,0,.08);
            font-weight:bold;
        }

        /* PRODUK */
        .produk-card{
            background:white;
            width:230px;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 4px 14px rgba(0,0,0,0.09);
        }

        .produk-card img{
            width:100%;
            height:150px;
            object-fit:cover;
        }

        .produk-card .p-info{
            padding:12px;
            font-weight:600;
            color:#0D47A1;
        }

    </style>

</head>

<body>

{{-- NAVBAR --}}
<nav>
    <div class="logo">MARKETPLACE SEKOLAH</div>

    <a href="{{ route('login') }}">Login</a>
</nav>



{{-- HERO --}}
<div class="hero">
    <h1>Marketplace Resmi Sekolah</h1>
    <p>Tempat jual beli antar pelajar, guru, dan warga sekolah</p>

    <a href="{{ route('register') }}" class="btn-login">Masuk Sekarang</a>

</div>


{{-- KATEGORI --}}
<div class="kategori-container">
    <div class="kategori-title">Kategori Produk</div>

    <div class="kategori-list">

        {{-- SEMUA PRODUK --}}
        <a href="{{ route('home') }}" style="text-decoration:none;">
            <div class="kategori-item" style="background:#1565C0;color:white;">
                Semua
            </div>
        </a>

        {{-- KATEGORI LOOP --}}
        @foreach($categories as $c)
            <a href="{{ route('kategori.show', $c->id) }}" style="text-decoration:none;">
                <div class="kategori-item">
                    {{ $c->nama }}
                </div>
            </a>
        @endforeach

    </div>
</div>




{{-- PRODUK TERBARU --}}
<div class="kategori-container">

    <div class="kategori-title">
        Produk Terbaru
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
           <a href="{{ route('detail', $p->id) }}"
        style="
          display:inline-block;
          padding:8px 15px;
          background:#0D47A1;
          color:white;
          text-decoration:none;
          border-radius:8px;
          font-weight:bold;
          transition:.25s;
          font-size:14px;
   "
       onmouseover="this.style.background='#1565C0'"
       onmouseout="this.style.background='#0D47A1'">
         Detail Produk
     </a>
        </div>
        @endforeach

    </div>

</div>

</div>

{{-- FOOTER --}}
<footer style="
    width:100%;
    background:#0D47A1;
    color:white;
    padding:40px 30px;
    margin-top:70px;
">

    <div style="
        max-width:1200px;
        margin:auto;
        display:flex;
        justify-content:space-between;
        flex-wrap:wrap;
        gap:40px;
    ">

        <div style="width:300px;">
            <h3 style="margin-bottom:15px;">Marketplace Sekolah</h3>
            <p style="opacity:.8;line-height:1.5;">
                Platform jual beli antar pelajar dan guru sekolah,
                nyaman, aman, dan terpercaya.
            </p>
        </div>

        <div>
            <h3 style="margin-bottom:15px;">Menu</h3>
            <ul style="list-style:none;padding:0;margin:0;line-height:2;">
                <li><a href="/" style="color:white;text-decoration:none;">Beranda</a></li>
                <li><a href="{{ route('login') }}" style="color:white;text-decoration:none;">Login</a></li>
            </ul>
        </div>

        <div>
            <h3 style="margin-bottom:15px;">Kontak</h3>
            <p style="margin:5px 0;"> 081234567890</p>
            <p style="margin:5px 0;"> info@sekolah.com</p>
        </div>

    </div>

    <hr style="border-color:rgba(255,255,255,.25);margin:25px 0;">

    <p style="text-align:center;opacity:.8;">
        © {{ date('Y') }} Marketplace Sekolah — All rights reserved
    </p>

</footer>


</body>

</html>
