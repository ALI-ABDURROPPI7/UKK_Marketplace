<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Marketplace Sekolah</title>

    <style>
        body{
            margin:0;
            padding:0;
            font-family: Arial;
            background:#0D47A1; /* biru tua sama login */
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .box{
            width:360px;
            background:#fff;
            padding:30px;
            border-radius:12px;
            box-shadow:0 6px 20px rgba(0,0,0,.28);
            animation: fadeIn .5s ease;
            text-align:center;
        }

        @keyframes fadeIn{
            from{opacity:0; transform:translateY(-12px);}
            to{opacity:1; transform:translateY(0);}
        }

        .logo{
            font-size:55px;
            color:#0D47A1;
            margin-bottom:8px;
        }

        h2{
            margin-bottom:6px;
            color:#0D47A1;
            font-size:22px;
            font-weight:bold;
        }

        p{
            margin-bottom:18px;
            font-size:14px;
            color:#555;
        }

        input{
            width:100%;
            padding:12px;
            border-radius:6px;
            border:1px solid #cfcfcf;
            background:#f6f6f6;
            margin-top:12px;
            font-size:15px;
        }

        input:focus{
            outline:none;
            border-color:#0D47A1;
        }

        button{
            width:100%;
            margin-top:20px;
            padding:12px;
            background:#0D47A1;
            border:none;
            color:white;
            font-size:17px;
            border-radius:8px;
            cursor:pointer;
            transition:.25s;
        }

        button:hover{
            background:#08398A;
        }

        a{
            color:#0D47A1;
            text-decoration:none;
            font-size:14px;
        }

    </style>
</head>
<body>

<div class="box">

    <div class="logo">
        <i class="fa-solid fa-shop"></i>
    </div>

    <h2>Daftar Akun</h2>
    <p>Buat akun baru untuk mulai berjualan</p>

    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <input type="text" name="name" placeholder="Nama Lengkap" required>

        <input type="text" name="username" placeholder="Username" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Daftar Sekarang</button>
    </form>

    <br><br>
    <a href="{{ route('login') }}">Sudah punya akun? Login</a>

</div>

</body>
</html>
