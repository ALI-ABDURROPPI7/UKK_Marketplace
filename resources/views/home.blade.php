<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Jual Beli Sekolah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4ff;
        }

        header {
            background-color: #1e3a8a;
            color: white;
            text-align: center;
            padding: 15px;
        }

        nav {
            background-color: #2563eb;
            text-align: center;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            text-align: center;
        }

        h2 {
            color: #1e3a8a;
        }

        .produk {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            border: 1px solid #ccc;
            width: 200px;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .card img {
            width: 100%;
            height: 130px;
            object-fit: cover;
            border-radius: 5px;
        }

        .btn-login {
            background-color: white;
            color: #1e3a8a;
            border: 1px solid white;
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
        }

        footer {
            background-color: #1e3a8a;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Marketplace Sekolah</h1>
        <p>Tempat jual beli barang Antar Warga  sekolah</p>
    </header>

    <nav>
        <a href="#">Beranda</a>
        <a href="#">Produk</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
        <a href="{{ route('login') }}" class="btn-login">Login</a>
    </nav>

    <div class="container">
        <h2>Produk Terbaru</h2>
        <div class="produk">
            <div class="card">
                <img src="https://via.placeholder.com/200x130" alt="Produk 1">
                <p>Buku Tulis - Rp 5.000</p>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/200x130" alt="Produk 2">
                <p>Pulpen Biru - Rp 3.000</p>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/200x130" alt="Produk 3">
                <p>Seragam Sekolah - Rp 80.000</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Jual Beli Sekolah</p>
    </footer>
</body>
</html>
