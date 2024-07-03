<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.c
ss">
</head>

@extends('layouts.template')
@section('content')

<body style="background: lightgray">
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <a href="{{ route('peminjaman.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PEMINJAMAN</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                                <tr>
                                <th scope="col">NAMA PEMINJAM</th>
                                    <th scope="col">TANGGAL PEMINJAMAN</th>
                                    <th scope="col">TANGGAL PENGEMBALIAN</th>
                                    <th scope="col">JUDUL BUKU</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                  <tbody>
                  @forelse ($data as $peminjaman)
                                    <tr>
                                        <td>{{ $peminjaman->nama_peminjam }}</td>

                                        <td>{{ $peminjaman->tgl_pinjam }}</td>

                                        <td>{{ $peminjaman->tgl_kembali }}</td>

                                        <td>{{ $peminjaman->judul }}</td>

                                        <td class="text-center">
                                            <form onsubmit="return

confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('peminjaman.destroy', $peminjaman->id_pinjam) }}" method="post">
                                                <a href="{{ route('peminjaman.edit', $peminjaman->id_pinjam) }}"
                                                    class="btn

btn-sm btn-primary">EDIT</a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data peminjaman belum Tersedia.
                                    </div>
                                @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.
    js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap
    .min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js
    "></script>
    <script>
        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
</body>

</html>
@endsection