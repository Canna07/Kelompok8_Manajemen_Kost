@extends('layouts.app')

@section('content')
<h4>Edit Kamar</h4>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('kamar.update',$kamar->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nomor Kamar</label>
        <input type="text" name="nomor_kamar" class="form-control"
               value="{{ $kamar->nomor_kamar }}" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control"
               value="{{ $kamar->harga }}" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="kosong" {{ $kamar->status=='kosong'?'selected':'' }}>Kosong</option>
            <option value="disewa" {{ $kamar->status=='disewa'?'selected':'' }}>Disewa</option>
        </select>
    </div>

    <button class="btn btn-warning">Update</button>
    <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
