<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('kamar.index', compact('kamars'));
    }

    public function create()
    {
        return view('kamar.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nomor_kamar' => 'required|unique:kamars,nomor_kamar',
        'harga' => 'required|numeric',
        'status' => 'required'
    ]);

    Kamar::create($request->all());

    return redirect('/kamar')->with('success','Kamar berhasil ditambahkan');
}


    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->update($request->all());

        return redirect('/kamar')->with('success','Kamar berhasil diupdate');
    }

    public function destroy($id)
    {
        Kamar::destroy($id);
        return redirect('/kamar')->with('success','Kamar berhasil dihapus');
    }
}
