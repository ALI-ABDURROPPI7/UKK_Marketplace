<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Panel')</title>
        <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: #f2f8ff;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        background: #1e88e5;
        color: white;
        position: fixed;
        left: 0;
        top: 0;
        padding: 20px;
        box-sizing: border-box;
    }

    .sidebar h2 {
        margin-bottom: 30px;
        font-size: 24px;
        text-align: center;
    }

    .sidebar a {
        display: block;
        text-decoration: none;
        color: white;
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 10px;
        font-size: 16px;
        transition: background 0.3s;
    }

    .sidebar a:hover {
        background: #1565c0;
    }

    .sidebar .logout {
        margin-top: 50px;
        background: #d32f2f;
    }

    .sidebar .logout:hover {
        background: #b71c1c;
    }

    .main-content {
        margin-left: 250px;
        padding: 40px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .content-wrapper {
        width: 100%;
        max-width: 1200px;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        text-align: center;
    }
</style>
</head>
<body>
<div class="sidebar">
    <h2>Admin Panel</h2>

    <a href="/admin/dashboard">Dashboard</a>
    <a href="/toko">Kelola Toko</a>
    <a href="/produk">Lihat Semua Produk</a>

    <a href="{{ route('logout') }}" class="logout">Logout</a>
</div>

    <div class="main-content">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

</body>
</html>

udah ngerjain tampilan beranda awal ,tampilan login tapi belum bisa login,dan tampilan dashboard admin,sekarang saya ngerjain apalagi agar project cepat selesai
