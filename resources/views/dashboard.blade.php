<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f2f8ff;
        }

        .header {
            background: #1e88e5;
            color: white;
            padding: 15px 25px;
            font-size: 22px;
        }

        .container {
            margin: 40px auto;
            width: 90%;
            max-width: 600px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .role-box {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
            font-size: 18px;
            color: #1565c0;
        }

        .menu {
            margin-top: 25px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            background: #1e88e5;
            color: white;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .menu a:hover {
            background: #1565c0;
        }
    </style>
</head>
<body>

    <div class="header">
        Dashboard - Jual Beli Sekolah
    </div>

    <div class="container">
        <h2>Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</h2>


    </div>

</body>
</html>
