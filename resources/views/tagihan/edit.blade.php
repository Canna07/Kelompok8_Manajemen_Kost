@extends('layouts.app')

@section('content')
<h4>Edit Tagihan</h4>

<form method="POST" action="{{ route('tagihan.update',$tagihan->id) }}">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Nama Penghuni</label>
    <input type="text" class="form-control"
           value="{{ $tagihan->penghuni->nama }}" readonly>
</div>

<div class="mb-3">
    <label>No Kamar</label>
    <input type="text" class="form-control"
           value="{{ $tagihan->penghuni->kamar->nomor_kamar }}" readonly>
</div>

<div class="mb-3">
    <label>Bulan</label>
    <input type="text" name="bulan"
           value="{{ $tagihan->bulan }}"
           class="form-control" required>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="belum_bayar"
            {{ $tagihan->status=='belum_bayar'?'selected':'' }}>
            Belum Bayar
        </option>
        <option value="lunas"
            {{ $tagihan->status=='lunas'?'selected':'' }}>
            Lunas
        </option>
    </select>
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
