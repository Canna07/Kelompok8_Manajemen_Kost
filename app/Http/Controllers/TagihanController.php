<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    // ================== INDEX ==================
    public function index()
    {
        $tagihans = Tagihan::with('penghuni.kamar')->get();
        return view('tagihan.index', compact('tagihans'));
    }

    // ================== CREATE ==================
    public function create()
    {
        $penghunis = Penghuni::with('kamar')->get();
        return view('tagihan.create', compact('penghunis'));
    }

    // ================== STORE ==================
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

    // ================== EDIT ==================
    public function edit($id)
    {
        $tagihan = Tagihan::with('penghuni.kamar')->findOrFail($id);
        return view('tagihan.edit', compact('tagihan'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required',
            'status' => 'required'
        ]);

        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update([
            'bulan' => $request->bulan,
            'status' => $request->status
        ]);

        return redirect('/tagihan')->with('success','Tagihan berhasil diupdate');
    }

    // ================== DELETE ==================
    public function destroy($id)
    {
        Tagihan::findOrFail($id)->delete();
        return redirect('/tagihan')->with('success','Tagihan berhasil dihapus');
    }
}
