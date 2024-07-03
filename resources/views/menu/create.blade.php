<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
</head>
@extends('layouts.template')
@section('content')

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Foto</label>
                                <input type="file" class="form-control @error('cover') is-invalid @enderror"
                                    name="cover" placeholder="Sampul">
                                <label class="font-weight-bold">Nama Makanan</label>
                                <input type="text" class="form-control @error('nama_makanan') is-invalid @enderror"
                                    name="nama_makanan" placeholder="Nama Makanan">

                                <!-- error message untuk judul -->
                                @error('nama_makanan')
                                    <div class="alert alert-danger

mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Stok</label>

                                <input type="number"
                                    class="form-control
@error('stok') is-invalid @enderror" name="stok" placeholder="Stok">
<!-- error message untuk tanggal_laporan_masuk

-->

@error('stok')
    <div class="alert alert-danger

mt-2">

    {{ $message }}
    </div>
@enderror
</div>
<div class="form-group">
                    <label class="font-weight-bold">Kategori</label>
                    <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($kategoriList as $id => $kategori)
                            <option value="{{ $id }}">{{ $kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                
<button type="submit" class="btn btn-md

btn-primary">SIMPAN</button>

<button type="reset" class="btn btn-md

btn-warning">RESET</button>
</form>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.
js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap
.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
</body>
</html>
@endsection