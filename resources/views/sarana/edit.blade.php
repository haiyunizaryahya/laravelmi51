@extends('layouts.main')

@section('content')
    @php
        // Debugging
        // dd($lantai); // Uncomment ini untuk memeriksa apakah $lantai ada
    @endphp

    <form action="{{ route('sarana.update', $sarana->id) }}" method="post">
        @csrf
        @method('PUT')

        <h4>EDIT</h4>
        <label for="nama_sarana">Nama Sarana</label>
        <input class="form-control" type="text" name="nama_sarana" value="{{ old('nama_sarana', $sarana->nama_sarana) }}">
        @error('nama_sarana')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" name="kategori" value="{{ old('kategori', $sarana->kategori) }}">
        @error('kategori')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary btn-rounded" type="submit">Simpan</button><br>
    </form>
@endsection
