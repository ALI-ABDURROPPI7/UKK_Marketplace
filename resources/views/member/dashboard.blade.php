<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Member Panel')</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

        .sidebar a, .sidebar form button {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: white;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 16px;
            transition: background 0.3s;
            background: transparent;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .sidebar a:hover,
        .sidebar form button:hover {
            background: #1565c0;
        }

        .logout-btn {
            background: #d32f2f;
        }

        .logout-btn:hover {
            background: #b71c1c;
        }

        .main-content {
            margin-left: 250px;
            padding: 40px;
            min-height: 100vh;
        }

        .content-wrapper {
            width: 100%;
            max-width: 1200px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Member Panel</h2>

    <a href="{{ route('member.dashboard') }}">
        <i class="fa-solid fa-gauge"></i> Dashboard
    </a>


    <a href="/member/produk">
        <i class="fa-solid fa-box"></i> Produk Saya
    </a>

    <a href="/member/kategori">
        <i class="fa-solid fa-layer-group"></i> Kategori
    </a>



    <form action="{{ route('member.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </form>
</div>

<div class="main-content">
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

</body>
</html>
