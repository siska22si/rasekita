<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Peminjaman</title>
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
                        <form action="{{ route('peminjaman.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Peminjam</label>

                                <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror"
                                    name="nama_peminjam" placeholder="Nama peminjam">

                                <!-- error message untuk nama_peminjaman -->
                                @error('nama_peminjam')
                                    <div class="alert alert-danger

mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Pinjam</label>
                                
                                <input type="datetime-local" class="form-control
                            @error('tgl_pinjam') is-invalid @enderror" name="tgl_pinjam"
                            ">
                            <!-- error message untuk tgl_pinjam -->

                            @error('tgl_pinjam')
                            <div class="alert alert-danger mt-2">

                            {{ $message }}
                            </div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Kembali</label>
                                
                                <input type="datetime-local" class="form-control
                            @error('tgl_kembali') is-invalid @enderror" name="tgl_kembali"
                            ">
                            <!-- error message untuk tgl_kembali -->

                            @error('tgl_kembali')
                            <div class="alert alert-danger mt-2">

                            {{ $message }}
                            </div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Judul Buku</label>
                                <select name="buku" class="form-control @error('buku') is-invalid @enderror">
                                    <option value="" disabled selected>Pilih Judul Buku</option>
                                    @foreach ($judulBukus as $judulBuku)
                                    <option value="{{ $judulBuku->id_buku }}">{{ $judulBuku->judul }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk buku -->
                                @error('buku')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
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