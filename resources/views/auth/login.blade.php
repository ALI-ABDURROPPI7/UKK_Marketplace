<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Marketplace Sekolah</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        body{
            margin:0;
            padding:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#1e3a8a; /* navy admin/member */
            font-family: Arial;
        }

        .login-box{
            width:360px;
            background:white;
            padding:35px;
            border-radius:14px;
            box-shadow:0 8px 18px rgba(0,0,0,0.20);
            animation:fade .4s ease;
            text-align:center;
        }

        @keyframes fade{
            from { opacity:0; transform:translateY(-10px);}
            to   { opacity:1; transform:translateY(0);}
        }

        .logo{
            font-size:50px;
            color:#1e40af;
            margin-bottom:12px;
        }

        h2{
            color:#1e3a8a;
            font-size:24px;
            font-weight:800;
            margin:0;
            margin-bottom:8px;
        }

        p{
            margin:0;
            color:#6c7280;
            margin-bottom:25px;
        }

        input{
            width:100%;
            padding:12px;
            margin-top:8px;
            background:#eef3ff;
            border:none;
            border-radius:8px;
            font-size:15px;
        }

        input:focus{
            outline:2px solid #1e40af;
        }

        button{
            width:100%;
            padding:12px;
            margin-top:18px;
            background:#1e40af;
            border:none;
            font-size:16px;
            border-radius:8px;
            font-weight:600;
            color:white;
            cursor:pointer;
            transition:.25s;
        }

        button:hover{
            background:#162f83;
        }

        .error{
            background:#fee2e2;
            color:#b91c1c;
            border:1px solid #fecaca;
            padding:10px;
            border-radius:6px;
            margin-bottom:12px;
            font-size:14px;
            font-weight:600;
        }

    </style>


</head>
<body>

<div class="login-box">

    <div class="logo">
        <i class="fa-solid fa-store"></i>
    </div>

    <h2>Login</h2>
    <p>Masukkan akun Anda untuk masuk</p>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Masuk</button>

        <br> <br>
        <a href="{{ route('register') }}">belum punya akun?Register</a>

    </form>

</div>

</body>
</html>
