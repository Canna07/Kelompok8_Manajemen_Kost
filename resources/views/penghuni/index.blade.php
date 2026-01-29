@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Penghuni</h4>
    <a href="{{ route('penghuni.create') }}" class="btn btn-primary">+ Tambah Penghuni</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered bg-white">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>No Kamar</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penghunis as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->no_hp }}</td>
            <td>{{ $p->kamar->nomor_kamar }}</td>
            <td>
                <a href="{{ route('penghuni.edit',$p->id) }}"
                   class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('penghuni.destroy',$p->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus penghuni?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
