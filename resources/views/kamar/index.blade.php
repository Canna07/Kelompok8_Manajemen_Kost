@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Data Kamar</h4>
    <a href="{{ route('kamar.create') }}" class="btn btn-primary">+ Tambah Kamar</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nomor Kamar</th>
            <th>Harga</th>
            <th>Status</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kamars as $kamar)
        @php
            // INI KUNCI UTAMANYA
            $status = strtolower(trim($kamar->status));
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kamar->nomor_kamar }}</td>
            <td>Rp {{ number_format($kamar->harga) }}</td>
            <td>
                <span class="badge {{ $status === 'disewa' ? 'bg-success' : 'bg-danger' }}">
                    {{ strtoupper($status) }}
                </span>
            </td>
            <td>
                <a href="{{ route('kamar.edit',$kamar->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('kamar.destroy',$kamar->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus kamar?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
