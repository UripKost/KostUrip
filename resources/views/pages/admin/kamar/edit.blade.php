@extends('pages.admin.layouts.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kamar</h1>
            <a href="{{ route('kamar.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('kamar.update', $kamar->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" id="gambar" name="gambar" class="form-control" placeholder="Gambar kamar">
                    @if($kamar->gambar)
                        <img src="{{ asset('storage/' . $kamar->gambar) }}" alt="Gambar kamar" class="img-fluid mt-2" style="max-width: 200px;">
                    @endif
                </div>
                <div class="form-group">
                    <label for="tipe">Tipe</label>
                    <input type="text" id="tipe" name="tipe" class="form-control" value="{{ old('tipe', $kamar->tipe) }}" placeholder="Tipe kamar">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="decimal" id="harga" name="harga" class="form-control" value="{{ old('harga', $kamar->harga) }}" placeholder="Harga kamar">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi kamar">{{ old('deskripsi', $kamar->deskripsi) }}</textarea>
                </div>
                <div class="form-group">           
                    <button type="submit" class="btn btn-midnight">Update</button>          
                </div>               
            </form>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
