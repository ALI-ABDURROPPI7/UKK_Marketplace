<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        *{
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: #f1f5ff;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #1b63d6;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px 20px;
            transition: .3s;
        }

        .sidebar h2 {
            margin-bottom: 35px;
            font-size: 23px;
            font-weight: bold;
            text-align: center;
        }

        .sidebar a,
        .sidebar form button {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            padding: 12px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            transition: .25s;
            border: none;
            background: transparent;
            cursor: pointer;
        }

        .sidebar a:hover,
        .sidebar form button:hover {
            background: rgba(255,255,255,0.15);
        }

        .logout-btn {
            background: #d03434 !important;
        }
        .logout-btn:hover{
            background:#b52828 !important;
        }

        .main-content {
            margin-left: 250px;
            padding: 35px;
            transition: .3s;
        }

        .content-wrapper {
            background:white;
            border-radius:14px;
            padding:30px;
            box-shadow:0 5px 18px rgba(0,0,0,0.08);
        }

        @media(max-width:900px){
            .sidebar{
                transform:translateX(-260px);
            }
            .sidebar.active {
                transform:translateX(0);
            }
            .main-content{
                margin-left:0;
                padding:20px;
            }

            .menu-btn{
                display:block;
            }
        }

        .menu-btn{
            position:fixed;
            left:15px;
            top:15px;
            z-index:300;
            font-size:22px;
            background:#1b63d6;
            color:white;
            border:none;
            padding:9px 12px;
            border-radius:8px;
            cursor:pointer;
            display:none;
        }
    </style>

</head>
<body>

<button class="menu-btn" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>

<div class="sidebar" id="sidebar">
    <h2>Admin Panel</h2>

    <a href="/admin/dashboard"><i class="fa-solid fa-gauge"></i> Dashboard</a>
    <a href="/toko"><i class="fa-solid fa-store"></i> Toko</a>
    <a href="/admin/produk"><i class="fa-solid fa-box"></i> Produk</a>
    <a href="/admin/user"><i class="fa-solid fa-user"></i> User</a>
    <a href="/kategori"><i class="fa-solid fa-layer-group"></i> Kategori</a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </button>
    </form>
</div>

<div class="main-content">

    {{-- ALERT --}}
    @if(session('success'))
        <div style="background:#39d679;color:white;padding:13px;border-radius:8px;margin-bottom:18px;font-weight:bold">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div style="background:#e93939;color:white;padding:13px;border-radius:8px;margin-bottom:18px;font-weight:bold">
            {{ session('error') }}
        </div>
    @endif

    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

<script>
function toggleSidebar(){
    document.getElementById("sidebar").classList.toggle("active");
}
</script>

</body>
</html>
