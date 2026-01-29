<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Tagihan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            // KAMAR
            'totalKamar'   => Kamar::count(),
            'kamarKosong'  => Kamar::where('status','kosong')->count(),
            'kamarDisewa'  => Kamar::where('status','disewa')->count(),

            // PENGHUNI
            'totalPenghuni'=> Penghuni::count(),

            // TAGIHAN
            'totalTagihan' => Tagihan::count(),
            'belumBayar'   => Tagihan::where('status','belum_bayar')->count(),
            'sudahBayar'   => Tagihan::where('status','lunas')->count(),
            'totalUang'    => Tagihan::where('status','lunas')->sum('jumlah'),
        ]);
    }
}
