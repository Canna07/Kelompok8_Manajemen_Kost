@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Tagihan</h4>
    <a href="{{ route('tagihan.create') }}" class="btn btn-primary">+ Buat Tagihan</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered bg-white">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No Kamar</th>
            <th>Bulan</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th width="200">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tagihans as $t)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $t->penghuni->nama }}</td>
            <td>{{ $t->penghuni->kamar->nomor_kamar }}</td>
            <td>{{ $t->bulan }}</td>
            <td>Rp {{ number_format($t->jumlah) }}</td>
            <td>
                <span class="badge {{ $t->status=='lunas' ? 'bg-success' : 'bg-danger' }}">
                    {{ $t->status == 'lunas' ? 'LUNAS' : 'BELUM BAYAR' }}
                </span>
            </td>
            <td>
                <a href="{{ route('tagihan.edit',$t->id) }}"
                   class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('tagihan.destroy',$t->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus tagihan?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
