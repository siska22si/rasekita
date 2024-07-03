<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Makanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.c
ss">

</head>

@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                                <tr>
                                    <th scope="col">FOTO</th>
                                    <th scope="col">NAMA MAKANAN</th>
                                    <th scope="col">STOK</th>
                                    <th scope="col">HARGA</th>
                                    <!-- <th scope="col">AKSI</th> -->
                                </tr>
                            </thead>
                  <tbody>
                  @forelse ($data as $menu)
<tr>
    <td><img src="{{ asset('storage/cover/'.$menu->cover) }}" width="100px" alt=""></td>
    <td>{{ $menu->nama_makanan }}</td>
    <td>{{ $menu->stok }}</td>
    <td>{{ $menu->harga }}</td>
    <td class="text-center">
        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
            action="{{ route('menu.destroy', $menu->id_makanan) }}" method="post">
            <a href="{{ route('menu.edit', $menu->id_makanan) }}" class="btn btn-sm btn-primary">EDIT</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center">Data menu belum tersedia.</td>
</tr>
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
</div>

@endsection