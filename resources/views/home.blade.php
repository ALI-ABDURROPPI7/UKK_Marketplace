<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Marketplace Sekolah</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Poppins, Arial;
            background: #f4f7ff;
        }

        /* NAVBAR */
        nav {
            background: #0D47A1;
            padding: 18px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        nav .logo {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        nav a {
            color: white;
            font-weight: bold;
            padding: 9px 16px;
            text-decoration: none;
            border-radius: 6px;
            transition: .2s;
        }

        nav a:hover {
            background: #1565C0;
        }

        /* HERO */
        .hero {
            padding: 120px 20px;
            text-align: center;
            background: #0D47A1;
            color: white;
        }

        .hero h1 {
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 17px;
            opacity: .9;
        }

        .btn-login {
            margin-top: 22px;
            background: #ffffff;
            color: #0D47A1;
            padding: 12px 22px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            display: inline-block;
            transition: .2s;
        }

        .btn-login:hover {
            background: #e5e5e5;
        }

        /* KATEGORI */
        .kategori-container {
            padding: 45px;
            max-width: 1200px;
            margin: auto;
        }

        .kategori-title {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #0D47A1;
            text-align: center;
        }

        .kategori-list {
            display: flex;
            justify-content: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .kategori-item {
            background: white;
            padding: 18px 25px;
            min-width: 130px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        .kategori-item:hover {
            background: #1565C0;
            color: white;
        }

        /* PRODUK */
        .produk-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-top: 25px;
        }

        .produk-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
            transition: .25s;
        }

        .produk-card:hover {
            transform: translateY(-4px);
        }

        .produk-card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
        }

        .produk-info {
            padding: 15px;
            text-align: center;
        }

        .produk-info h3 {
            font-size: 17px;
            margin: 8px 0;
            font-weight: 600;
        }

        .produk-info p {
            color: #1E88E5;
            font-weight: bold;
        }

        .btn-detail {
            display: inline-block;
            margin-top: 8px;
            padding: 8px 15px;
            background: #0D47A1;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: .25s;
            font-size: 14px;
        }

        .btn-detail:hover {
            background: #1565C0;
        }

        /* FOOTER */
        footer {
            width: 100%;
            background: #0D47A1;
            color: white;
            padding: 40px 30px;
            margin-top: 70px;
        }

        footer .row {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 40px;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer hr {
            border-color: rgba(255, 255, 255, .2);
            margin: 25px 0;
        }

        footer p {
            text-align: center;
            opacity: .8;
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">MARKETPLACE SEKOLAH</div>
        <a href="{{ route('login') }}">Login</a>
    </nav>

    <div class="hero">
        <h1>Marketplace Resmi Sekolah</h1>
        <p>Tempat jual beli antar pelajar, guru, dan warga sekolah</p>

        <a href="{{ route('register') }}" class="btn-login">Daftar Sekarang</a>
    </div>

    <!-- KATEGORI -->
    <div class="kategori-container">

        <div class="kategori-title">Kategori Produk</div>

        <div class="kategori-list">

            <a href="{{ route('home') }}" style="text-decoration:none;">
                <div class="kategori-item" style="background:#1565C0;color:white;">
                    Semua
                </div>
            </a>

            @foreach($categories as $c)
                <a href="{{ route('kategori.show', $c->id) }}" style="text-decoration:none;">
                    <div class="kategori-item">
                        {{ $c->nama }}
                    </div>
                </a>
            @endforeach

        </div>
    </div>

    <!-- PRODUK -->
    <div class="kategori-container">

        <div class="kategori-title">Produk Terbaru</div>

        <div class="produk-grid">

            @foreach($products as $p)
                <div class="produk-card">
                    <img src="{{ $p->foto ? asset('storage/produk/'.$p->foto) : 'https://via.placeholder.com/200' }}">

                    <div class="produk-info">
                        <h3>{{ $p->nama }}</h3>
                        <p>Rp {{ number_format($p->harga,0,',','.') }}</p>

                        <a class="btn-detail" href="{{ route('detail', $p->id) }}">
                            Detail Produk
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

    <!-- FOOTER -->
    <footer>
        <div class="row">

            <div>
                <h3>Marketplace Sekolah</h3>
                <p>Platform jual beli antar pelajar dan guru. Aman & terpercaya.</p>
            </div>

            <div>
                <h3>Menu</h3>
                <a href="/">Beranda</a><br>
                <a href="{{ route('login') }}">Login</a>
            </div>

            <div>
                <h3>Kontak</h3>
                <p>081234567890</p>
                <p>info@sekolah.com</p>
            </div>

        </div>

        <hr>

        <p>© {{ date('Y') }} Marketplace Sekolah — All rights reserved</p>
    </footer>

</body>
</html>
