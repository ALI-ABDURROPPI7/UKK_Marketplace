<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Member Panel')</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f1f5fe;
            font-family: Arial, sans-serif;
        }

        /* SIDEBAR */
        .sidebar{
            width:250px;
            height:100vh;
            background:#1e40af;
            color:white;
            position:fixed;
            left:0;
            top:0;
            padding:20px;
            box-sizing:border-box;
        }

        .sidebar h2{
            text-align:center;
            margin-bottom:28px;
            font-size:22px;
            font-weight:bold;
        }

        .sidebar a,
        .sidebar form button{
            display:flex;
            align-items:center;
            gap:12px;
            padding:12px 15px;
            text-decoration:none;
            color:white;
            border:none;
            background:none;
            cursor:pointer;
            font-size:15px;
            border-radius:8px;
            margin-bottom:10px;
            transition:.25s;
            font-weight:600;
        }

        .sidebar a:hover,
        .sidebar form button:hover{
            background:#16318f;
        }

        .logout-btn{
            background:#dc2626 !important;
        }
        .logout-btn:hover{
            background:#b91c1c !important;
        }

        /* CONTENT */
        .main-content{
            margin-left:250px;
            padding:35px;
        }

        .content-wrapper{
            background:white;
            width:100%;
            padding:25px;
            border-radius:12px;
            box-shadow:0 3px 12px rgba(0,0,0,0.1);
        }

    </style>
</head>
<body>

@php
    use App\Models\Toko;
    $toko = Toko::where('user_id',auth()->id())->first();
@endphp


<div class="sidebar">

    <h2>Member Panel</h2>

    <a href="{{ route('member.index') }}">
        <i class="fa-solid fa-gauge"></i> Dashboard
    </a>

    @if($toko)
        <a href="{{ url('/member/produk/'.$toko->id) }}">
            <i class="fa-solid fa-box"></i> Produk Saya
        </a>
    @else
        <a href="#" onclick="alert('Anda belum memiliki toko, hubungi admin!')">
            <i class="fa-solid fa-box"></i> Produk Saya
        </a>
    @endif

    <a href="/member/kategori">
        <i class="fa-solid fa-layer-group"></i> Kategori
    </a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </form>

</div>


<div class="main-content">
    <div class="content-wrapper">

        {{-- OPTIONAL ALERT --}}
        @if(session('success'))
            <div style="
                background:#16a34a;
                padding:12px;
                border-radius:8px;
                margin-bottom:18px;
                font-weight:bold;
                color:white;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>
</div>

</body>
</html>
