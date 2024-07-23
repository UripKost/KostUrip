@extends('pages.admin.layouts.main')
@section('container')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Kamar</h6>
                <a href="{{ route('kamar.tambah') }}" class="btn btn-sm btn-primary shadow-sm">Tambah Kamar</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            @foreach ($dtkamar as $kamar)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $kamar->gambar) }}" alt="Gambar Kamar"
                                            width="30"></td>
                                    <td>{{ $kamar->tipe }}</td>
                                    <td>{{ $kamar->harga }}</td>
                                    <td>{{ $kamar->deskripsi }}</td>
                                    <td>
                                        <a href="{{ route('kamar.edit', $kamar->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus kamar ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    {{-- <div class="container-fluid">
        @if (session('success'))
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
                @foreach ($dtkamar as $kamar)
                    <tr>
                        <td><img src="{{ asset('storage/' . $kamar->gambar) }}" alt="Gambar Kamar" width="30"></td>
                        <td>{{ $kamar->tipe }}</td>
                        <td>{{ $kamar->harga }}</td>
                        <td>{{ $kamar->deskripsi }}</td>
                        <td>
                            <a href="{{ route('kamar.edit', $kamar->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus kamar ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
@endsection
