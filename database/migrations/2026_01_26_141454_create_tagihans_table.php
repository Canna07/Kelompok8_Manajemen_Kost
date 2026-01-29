<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::with('penghuni.kamar')->get();
        return view('tagihan.index', compact('tagihans'));
    }

    public function create()
    {
        $penghunis = Penghuni::with('kamar')->get();
        return view('tagihan.create', compact('penghunis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penghuni_id' => 'required',
            'bulan' => 'required'
        ]);

        $penghuni = Penghuni::with('kamar')->findOrFail($request->penghuni_id);

        Tagihan::create([
            'penghuni_id' => $penghuni->id,
            'bulan' => $request->bulan,
            'jumlah' => $penghuni->kamar->harga,
            'status' => 'belum_bayar'
        ]);

        return redirect('/tagihan')->with('success','Tagihan berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update(['status' => 'lunas']);

        return redirect('/tagihan')->with('success','Tagihan sudah dibayar');
    }
}
