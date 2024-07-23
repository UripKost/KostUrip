@extends('pages.admin.layouts.main')
@section('container')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="mb-3">
    <a href="{{ route('kamar.tambah') }}" class="btn btn-primary">Tambah Kamar</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dtkamar as $kamar)
        <tr>
            <td><img src="{{ asset('storage/' . $kamar->gambar) }}" alt="Gambar Kamar" width="100"></td>
            <td>{{ $kamar->tipe }}</td>
            <td>{{ $kamar->harga }}</td>
            <td>{{ $kamar->deskripsi }}</td>
            <td>
                <a href="{{ route('kamar.edit', $kamar->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kamar ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
