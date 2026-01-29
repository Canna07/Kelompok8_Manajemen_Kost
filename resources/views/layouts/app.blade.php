<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kost Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f6f1ec;
            font-family: 'Segoe UI', sans-serif;
            color: #4a4a4a;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            background-color: #f1e8df;
            position: fixed;
            padding: 25px 15px;
        }

        .sidebar .brand {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            margin-bottom: 8px;
            border-radius: 12px;
            color: #6b5e54;
            text-decoration: none;
            font-weight: 500;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #e7dbcf;
            color: #3e342b;
        }

        /* CONTENT */
        .content {
            margin-left: 260px;
            padding: 35px;
        }

        /* CARD */
        .card-stat {
            background-color: #ffffff;
            border-radius: 18px;
            border: none;
            padding: 20px;
            box-shadow: 0 8px 18px rgba(0,0,0,0.05);
        }

        .card-stat h6 {
            color: #8b7d72;
            font-size: 14px;
        }

        .card-stat h2 {
            font-weight: 600;
            margin-top: 8px;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="brand">
        <img src="{{ asset('img/logo.jpeg') }}"
     class="rounded-circle"
     width="40"
     height="40">
        <span>Kost Saya!</span>
    </div>

    <a href="/" class="active">Beranda</a>
    <a href="/kamar">Kamar</a>
    <a href="/tagihan">Tagihan</a>
    <a href="/penghuni">Penghuni</a>
    <a href="/logout">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">
    @yield('content')
</div>

</body>
</html>
