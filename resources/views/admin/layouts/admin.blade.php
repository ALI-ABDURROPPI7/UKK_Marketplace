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

        /
