<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Marketplace Sekolah</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #1E88E5; /* biru */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: #fff;
            width: 340px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.25);
            animation: fadeIn 0.5s ease;
            text-align: center;
        }

        /* Animasi masuk */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-15px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Logo */
        .logo {
            font-size: 55px;
            color: #1E88E5;
            margin-bottom: 10px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            color: #1E88E5;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 14px;
            color: #555;
            margin-bottom: 25px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: #f7f7f7;
        }

        input:focus {
            outline: none;
            border-color: #1E88E5;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #1E88E5;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.2s;
        }

        button:hover {
            background: #1565C0;
        }

        .error {
            background: #ffcccc;
            padding: 10px;
            border-radius: 5px;
            color: #b20000;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-box">

    <div class="logo">
        <i class="fa-solid fa-shop"></i>
    </div>

    <div class="title">Marketplace Sekolah</div>
    <div class="subtitle">Silakan login untuk melanjutkan</div>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Masuk</button>
    </form>

</div>

</body>
</html>
