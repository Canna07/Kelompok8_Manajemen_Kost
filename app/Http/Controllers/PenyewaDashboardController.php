<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;

class PenyewaDashboardController extends Controller
{
    public function index($id)
{
    $penghuni = Penghuni::with(['kamar','tagihans'])->find($id);

    if (!$penghuni) {
        return redirect()->back()->with('error','Penghuni tidak ditemukan');
    }

    $totalTagihanSemua = $penghuni->tagihans->sum('jumlah');
    $totalTagihanBelumLunas = $penghuni->tagihans
        ->where('status', '!=', 'lunas')
        ->sum('jumlah');

    return view('penyewa.dashboard', [
        'penghuni' => $penghuni,
        'totalTagihanSemua' => $totalTagihanSemua,
        'totalTagihanBelumLunas' => $totalTagihanBelumLunas
    ]);
}
}
