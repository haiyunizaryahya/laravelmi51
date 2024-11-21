@extends('layouts.main')

@section('content')
    @php
        // Debugging
        // dd($lantai); // Uncomment ini untuk memeriksa apakah $lantai ada
    @endphp

    <form action="{{ route('lantai.update', $lantai->id) }}" method="post">
        @csrf
        @method('PUT')

        <h4>EDIT</h4>
        <label for="nama_lantai">Nama Lokasi</label>
        <input class="form-control" type="text" name="nama_lantai" value="{{ old('nama_lantai', $lantai->nama_lantai) }}">
        
        @error('nama_lantai')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        
        <button class="btn btn-primary btn-rounded" type="submit">Simpan</button><br>
    </form>
@endsection
