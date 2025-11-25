{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: Arial;
            background: #f6f9ff;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #1e88e5;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px;
            color: white;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            margin-bottom: 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background: #1565c0;
        }

        .logout-btn {
            background:#d32f2f;
            color:white;
            border:none;
            padding:10px;
            width:100%;
            border-radius:5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap:10px;
            margin-top:20px;
            cursor:pointer;
        }

        .container {
            margin-left: 260px;
            padding: 20px;
        }

    </style>
</head>
<body>

    <div class="sidebar">
    <h2>Admin Panel</h2>

    <a href="/admin/dashboard"><i class="fa-solid fa-gauge"></i> Dashboard</a>
    <a href="/toko"><i class="fa-solid fa-store"></i> Toko</a>
    <a href="/produk"><i class="fa-solid fa-box"></i> Produk</a>
    <a href="/User"><i class="fa-solid fa-user"></i> User</a>
    <a href="/kategori"><i class="fa-solid fa-layer-group"></i> Kategori</a>

    <!-- LOGOUT POST -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </form>
</div>
    <div class="container">
        @yield('content')
    </div>

</body>
</html> --}}
