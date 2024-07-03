<!-- resources/views/pustakawan/create.blade.php -->

@extends('pages.tables') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Tambah Pustakawan Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
             
                </ul>
            </div>
        @endif

        <form action="{{ route('pustakawan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
            </div>

            <button type="submit" class="btn btn-primary">Tambah Pustakawan</button>
        </form>
    </div>
@endsection
