@extends('layouts.app')

@section('content')
<h4>Tambah Penghuni</h4>

<form method="POST" action="{{ route('penghuni.store') }}">
@csrf

<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
    <label>No HP</label>
    <input type="text" name="no_hp" class="form-control" required>
</div>

<div class="mb-3">
    <label>Nomor Kamar</label>
    <select name="kamar_id" class="form-control" required>
        <option value="">-- Pilih Kamar --</option>
        @foreach($kamars as $kamar)
            <option value="{{ $kamar->id }}">
                {{ $kamar->nomor_kamar }}
            </option>
        @endforeach
    </select>
</div>

<button class="btn btn-primary">Simpan</button>
<a href="{{ route('penghuni.index') }}" class="btn btn-secondary">Kembali</a>

</form>
@endsection
