<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Penyewa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background: #f5f1ed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(90deg, #8b5e3c, #c2a27c);
            padding: 12px 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            color: #fff;
        }
        .navbar-custom a {
            color: #fff;
            font-weight: 500;
            text-decoration: none;
        }
        .navbar-custom a:hover {
            color: #f0e6d2;
        }

        /* Cards */
        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background: linear-gradient(90deg, #8b5e3c, #c2a27c);
            color: #fff;
            font-weight: 600;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        /* Badges */
        .badge.bg-success {
            background-color: #28a745 !important;
            font-size: 0.9rem;
        }
        .badge.bg-danger {
            background-color: #dc3545 !important;
            font-size: 0.9rem;
        }

        /* Table */
        .table thead {
            background-color: #c2a27c;
            color: #4e342e;
        }
        .table tbody tr:hover {
            background-color: #f2e6d9;
            cursor: pointer;
        }

        /* Typography */
        h2, h5 {
            color: #4e342e;
        }
        i {
            color: #8b5e3c;
        }

        /* Ringkasan tagihan */
        .summary-card {
            border-radius: 15px;
            background: #fff3e0;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            text-align: center;
        }
        .summary-card h5 {
            font-weight: 600;
        }
        .summary-card p {
            font-size: 1.1rem;
        }

        /* Footer */
        .footer {
            margin-top: 50px;
            text-align: center;
            color: #8b5e3c;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container py-4">

    <!-- NAVBAR -->
    <div class="d-flex justify-content-between navbar-custom align-items-center">
        <h4 class="mb-0 text-white"><i class="bi bi-speedometer2"></i> Dashboard Penyewa</h4>
        <a href="{{ route('logout') }}" 
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
   class="btn btn-outline-light btn-sm">
    <i class="bi bi-box-arrow-right"></i> Logout
</a>

        <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
            @csrf
        </form>
    </div>

    <p class="text-muted mb-5 text-center">
        Informasi kamar & tagihan Anda
    </p>

    <!-- INFORMASI KAMAR -->
    <div class="card shadow-sm mb-4">
        <div class="card-header fw-semibold">
            <i class="bi bi-house-door"></i> Informasi Kamar
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <p><i class="bi bi-person"></i> <strong>Nama:</strong> {{ $penghuni->nama }}</p>
                <p><i class="bi bi-door-open"></i> <strong>No Kamar:</strong> {{ $penghuni->kamar->nomor_kamar ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <p>
                    <i class="bi bi-cash-coin"></i>
                    <strong>Harga:</strong>
                    Rp {{ number_format($penghuni->kamar->harga ?? 0,0,',','.') }}
                </p>
                <p>
                    <i class="bi bi-check-circle-fill text-success"></i>
                    <strong>Status:</strong>
                    <span class="badge bg-success">Terisi</span>
                </p>
            </div>
        </div>
    </div>

    <!-- RINGKASAN TAGIHAN -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="summary-card">
                <h5><i class="bi bi-calculator"></i> Total Tagihan Semua</h5>
                <p>Rp {{ number_format($totalTagihanSemua,0,',','.') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="summary-card">
                <h5><i class="bi bi-exclamation-triangle"></i> Total Tagihan Belum Lunas</h5>
                <p class="text-danger">Rp {{ number_format($totalTagihanBelumLunas,0,',','.') }}</p>
            </div>
        </div>
    </div>

    <!-- RIWAYAT TAGIHAN -->
    <div class="card shadow-sm">
        <div class="card-header fw-semibold">
            <i class="bi bi-receipt"></i> Riwayat Tagihan
        </div>
        <div class="card-body">
            @if($penghuni->tagihans->count() > 0)
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Bulan</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penghuni->tagihans as $tagihan)
                        <tr>
                            <td>{{ $tagihan->bulan }}</td>
                            <td>Rp {{ number_format($tagihan->jumlah,0,',','.') }}</td>
                            <td>
                                @if($tagihan->status == 'lunas')
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle"></i> Lunas
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        <i class="bi bi-x-circle"></i> Belum Lunas
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted text-center">
                    <i class="bi bi-info-circle"></i> Belum ada tagihan
                </p>
            @endif
        </div>
    </div>

    
</div>

</body>
</html>
