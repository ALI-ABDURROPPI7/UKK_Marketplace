<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Jual Beli Sekolah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            padding: 35px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            width: 380px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-10px);}
            to {opacity: 1; transform: translateY(0);}
        }
        h2 {
            margin-bottom: 10px;
            color: #2d3436;
        }
        p {
            margin-top: 0;
            margin-bottom: 25px;
            color: #636e72;
            font-size: 14px;
        }
        input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #dfe6e9;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s;
        }
        input:focus {
            border-color: #0984e3;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #0984e3;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #0873c4;
        }
        .error {
            background: #ffeaa7;
            color: #d63031;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .footer {
            margin-top: 20px;
            font-size: 13px;
            color: #636e72;
        }
        .footer a {
            color: #0984e3;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Masuk Akun</h2>
        <p>Gunakan email dan password Anda untuk masuk</p>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="email" name="email" placeholder="Alamat Email" required>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <button type="submit">Masuk</button>
        </form>

        <div class="footer">
            Belum punya akun? <a href="/register">Daftar di sini</a>
        </div>
    </div>

</body>
</html>
