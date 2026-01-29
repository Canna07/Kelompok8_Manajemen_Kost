<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>My Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f6f1ec;
            color: #4a4a4a;
        }

        .navbar {
            background-color: #8b5e3c; /* coklat tua */
            padding: 15px 30px;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            margin-left: 20px;
        }

        .hero {
            text-align: center;
            padding: 80px 20px;
            background-color: #d9b38c; /* coklat muda */
            border-radius: 15px;
            margin: 20px auto;
            max-width: 900px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #4a2f1f;
        }

        .hero p {
            font-size: 18px;
            color: #3e2a1f;
            margin-bottom: 30px;
        }

        .btn-login {
            background-color: #6b3e26;
            color: #fff;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-login:hover {
            background-color: #4a2f1f;
        }

        .stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
        }

        .stat-box {
            background-color: #fff2e6;
            padding: 20px 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 150px;
        }

        .stat-box h2 {
            font-size: 32px;
            margin-bottom: 5px;
            color: #4a2f1f;
        }

        .stat-box p {
            font-size: 16px;
            color: #3e2a1f;
            margin-top: 5px;
        }

        .stat-box i {
            font-size: 32px;
            color: #8b5e3c;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar d-flex justify-content-end">
    <a href="{{ url('/') }}">Beranda</a>
    <a href="{{ route('login') }}">Login</a>
</nav>

<div class="hero">
    <h1>My Kos</h1>
    <p>Kos nyaman dan aman untuk mahasiswa dan pekerja. Lingkungan bersih, fasilitas lengkap, harga terjangkau.</p>
    
    <div class="stats">
        <div class="stat-box">
            <i class="bi bi-house-door-fill"></i>
            <h2>{{ $totalKamar }}</h2>
            <p>Total Kamar</p>
        </div>
        <div class="stat-box">
            <i class="bi bi-door-open-fill"></i>
            <h2>{{ $kamarKosong }}</h2>
            <p>Kamar Tersedia</p>
        </div>
    </div>

    <a href="{{ route('login') }}" class="btn-login mt-4">Login</a>
</div>

</body>
</html>
