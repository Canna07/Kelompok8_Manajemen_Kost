@extends('layouts.app')

@section('content')
<h4>Tambah Kamar</h4>

{{-- ALERT ERROR --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('kamar.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nomor Kamar</label>
        <input
            type="text"
            name="nomor_kamar"
            class="form-control @error('nomor_kamar') is-invalid @enderror"
            value="{{ old('nomor_kamar') }}"
            required
        >
        @error('nomor_kamar')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input
            type="number"
            name="harga"
            class="form-control @error('harga') is-invalid @enderror"
            value="{{ old('harga') }}"
            required
        >
        @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select
            name="status"
            class="form-control @error('status') is-invalid @enderror"
            required
        >
            <option value="">-- Pilih Status --</option>
            <option value="kosong" {{ old('status')=='kosong'?'selected':'' }}>Kosong</option>
            <option value="disewa" {{ old('status')=='disewa'?'selected':'' }}>Disewa</option>
        </select>
        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
