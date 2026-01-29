@extends('layouts.app')

@section('content')

{{-- HEADER SELAMAT DATANG --}}
<div class="d-flex align-items-center mb-4 gap-3">
    {{-- FOTO / LOGO --}}
    <img src="{{ asset('img/logo.jpeg') }}"
         alt="Kost"
         class="rounded-circle shadow-sm"
         style="height:70px; width:70px; object-fit:cover;">

    {{-- TEKS --}}
    <div>
        <h4 class="mb-1 fw-semibold">Selamat Datang di Kost</h4>
        <small class="text-muted">Sistem Manajemen Kost</small>
    </div>
</div>

<div class="row g-3">

    <!-- TOTAL KAMAR -->
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Total Kamar</small>
                <h3 class="fw-bold">{{ $totalKamar }}</h3>
            </div>
        </div>
    </div>

    <!-- KAMAR KOSONG -->
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Kamar Kosong</small>
                <h3 class="fw-bold text-danger">{{ $kamarKosong }}</h3>
            </div>
        </div>
    </div>

    <!-- KAMAR DISEWA -->
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Kamar Disewa</small>
                <h3 class="fw-bold text-success">{{ $kamarDisewa }}</h3>
            </div>
        </div>
    </div>

    <!-- TOTAL PENGHUNI -->
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Total Penghuni</small>
                <h3 class="fw-bold">{{ $totalPenghuni }}</h3>
            </div>
        </div>
    </div>

    <!-- TAGIHAN BELUM BAYAR -->
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Tagihan Belum Bayar</small>
                <h3 class="fw-bold text-warning">{{ $belumBayar }}</h3>
            </div>
        </div>
    </div>

    <!-- TAGIHAN LUNAS -->
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Tagihan Lunas</small>
                <h3 class="fw-bold text-success">{{ $sudahBayar }}</h3>
            </div>
        </div>
    </div>

    <!-- TOTAL PEMASUKAN -->
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Total Pemasukan</small>
                <h3 class="fw-bold">Rp {{ number_format($totalUang) }}</h3>
            </div>
        </div>
    </div>

</div>
@endsection
