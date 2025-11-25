<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f2f8ff;
        }

        /* SIDEBAR */
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
            transition: transform 0.3s ease-in-out;
        }

        /* Sidebar hidden (mobile mode) */
        .sidebar.closed {
            transform: translateX(-260px);
        }

        .sidebar h2 {
            margin-bottom: 30px;
            font-size: 24px;
            text-align: center;
        }

        .sidebar a,
        .sidebar form button {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: white;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 16px;
            background: transparent;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .sidebar a:hover,
        .sidebar form button:hover {
            background: #1565c0;
        }

        /* Logout */
        .logout-btn {
            background: #d32f2f;
        }

        .logout-btn:hover {
            background: #b71c1c;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        /* Hamburger button */
        .menu-btn {
            display: none;
            font-size: 24px;
            background: #1e88e5;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 999;
        }

        @media(max-width:900px){
            .menu-btn{
                display:block;
            }
            .main-content{
                margin-left:0;
            }
        }
    </style>
</head>
<body>

    <button class="menu-btn" onclick="toggleMenu()">
        <i class="fa-solid fa-bars"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <h2>Admin Panel</h2>

        <a href="/admin/dashboard"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <a href="/toko"><i class="fa-solid fa-store"></i> Toko</a>
        <a href="/produk"><i class="fa-solid fa-store"></i> Produk</a>
        <a href="/user"><i class="fa-solid fa-user"></i> User</a>
        <a href="/kategori"><i class="fa-solid fa-layer-group"></i> Kategori</a>


    </div>


    <div class="main-content">

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div style="
                background:#4caf50;
                color:white;
                padding:12px;
                border-radius:6px;
                margin-bottom:15px;
                font-weight:bold;
                ">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>

    <script>
        function toggleMenu(){
            document.getElementById('sidebar').classList.toggle('closed')
        }
    </script>

</body>
</html>
