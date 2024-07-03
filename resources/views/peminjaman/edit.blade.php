<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Peminjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@extends('layouts.template')
@section('content')

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('peminjaman.update', $data->id_pinjam) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')  
                            <div class="form-group">
                                <label class="font-weight-bold">Nama peminjam</label>
                                <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam" placeholder="Nama Peminjam" value="{{ $data->nama_peminjam }}">
                                @error('nama_peminjam')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Peminjaman</label>                                
                                <input type="datetime-local" class="form-control @error('tgl_pinjam') is-invalid @enderror" name="tgl_pinjam" value="{{ $data->tgl_pinjam }}">
                                @error('tgl_pinjam')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Kembali</label>                                
                                <input type="datetime-local" class="form-control @error('tgl_kembali') is-invalid @enderror" name="tgl_kembali" value="{{ $data->tgl_kembali }}">
                                @error('tgl_kembali')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Judul Buku</label>
                                <select name="buku" class="form-control @error('buku') is-invalid @enderror">
                                    <option value="" disabled>Pilih Judul Buku</option>
                                    @foreach ($judulBukus as $judulBuku)
                                        <option value="{{ $judulBuku->id_buku }}" {{ $data->buku == $judulBuku->id_buku ? 'selected' : '' }}>
                                            {{ $judulBuku->judul }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('buku')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection