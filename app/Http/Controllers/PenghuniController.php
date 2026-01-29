<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghunis = Penghuni::with('kamar')->get();
        return view('penghuni.index', compact('penghunis'));
    }

    public function create()
    {
        // ambil kamar yang masih kosong
        $kamars = Kamar::where('status','kosong')->get();
        return view('penghuni.create', compact('kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'no_hp'    => 'required',
            'kamar_id' => 'required'
        ]);

        // simpan penghuni
        Penghuni::create($request->all());

        // ubah status kamar jadi disewa
        Kamar::where('id', $request->kamar_id)
            ->update(['status' => 'disewa']);

        return redirect('/penghuni')
            ->with('success','Penghuni berhasil ditambahkan');
    }

    /* ================= EDIT ================= */
    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);

        // ambil semua kamar + kamar yang sedang dipakai penghuni ini
        $kamars = Kamar::where('status','kosong')
                    ->orWhere('id', $penghuni->kamar_id)
                    ->get();

        return view('penghuni.edit', compact('penghuni','kamars'));
    }

    /* ================= UPDATE ================= */
    public function update(Request $request, $id)
    {
        $penghuni = Penghuni::findOrFail($id);

        $request->validate([
            'nama'     => 'required',
            'no_hp'    => 'required',
            'kamar_id' => 'required'
        ]);

        // kalau kamar diganti
        if ($penghuni->kamar_id != $request->kamar_id) {

            // kamar lama jadi kosong
            Kamar::where('id', $penghuni->kamar_id)
                ->update(['status' => 'kosong']);

            // kamar baru jadi disewa
            Kamar::where('id', $request->kamar_id)
                ->update(['status' => 'disewa']);
        }

        // update data penghuni
        $penghuni->update($request->all());

        return redirect('/penghuni')
            ->with('success','Penghuni berhasil diupdate');
    }

    /* ================= DELETE ================= */
    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);

        // balikin status kamar ke kosong
        Kamar::where('id', $penghuni->kamar_id)
            ->update(['status' => 'kosong']);

        $penghuni->delete();

        return redirect('/penghuni')
            ->with('success','Penghuni dihapus');
    }
}
