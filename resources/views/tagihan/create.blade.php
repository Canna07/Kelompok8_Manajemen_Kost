@extends('layouts.app')

@section('content')
<h4>Buat Tagihan</h4>

<form method="POST" action="{{ route('tagihan.store') }}">
@csrf

<div class="mb-3">
    <label>Penghuni</label>
    <select name="penghuni_id" class="form-control" required>
        <option value="">-- Pilih Penghuni --</option>
        @foreach($penghunis as $p)
            <option value="{{ $p->id }}">
                {{ $p->nama }} - Kamar {{ $p->kamar->nomor_kamar }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Bulan</label>
    <input type="text" name="bulan" class="form-control" placeholder="Januari 2026" required>
</div>

<button class="btn btn-primary">Simpan</button>
<a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
