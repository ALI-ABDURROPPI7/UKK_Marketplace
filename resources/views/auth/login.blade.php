<!DOCTYPE html>
<html>
<head>
    <title>Login - Jual Beli Sekolah</title>
</head>
<body>  
    <h1>Halaman Login</h1>
    <form action="#" method="POST">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
