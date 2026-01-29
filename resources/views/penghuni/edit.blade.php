@extends('layouts.app')

@section('content')
<h4>Edit Penghuni</h4>

<form method="POST" action="{{ route('penghuni.update',$penghuni->id) }}">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama"
           class="form-control"
           value="{{ $penghuni->nama }}" required>
</div>

<div class="mb-3">
    <label>No HP</label>
    <input type="text" name="no_hp"
           class="form-control"
           value="{{ $penghuni->no_hp }}" required>
</div>

<div class="mb-3">
    <label>Nomor Kamar</label>
    <select name="kamar_id" class="form-control" required>
        @foreach($kamars as $kamar)
            <option value="{{ $kamar->id }}"
                {{ $penghuni->kamar_id == $kamar->id ? 'selected' : '' }}>
                {{ $kamar->nomor_kamar }}
            </option>
        @endforeach
    </select>
</div>

<button class="btn btn-warning">Update</button>
<a href="{{ route('penghuni.index') }}" class="btn btn-secondary">Kembali</a>

</form>
@endsection