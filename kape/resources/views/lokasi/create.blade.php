@extends('layouts.main')
@section('content')
<div class="container">
    <h1>Tambah Ruang</h1>
    <form action="{{ route('lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Ruang</label>
            <input type="text" name="nama_lokasi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <select name="lantai_id" class="form-control" required>
                @foreach ($lantais as $lantai)
                    <option value="{{ $lantai->id }}">{{ $lantai->nama_lantai }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #e3f2fd; /* Warna biru muda */
    }
    .container {
        margin-top: 20px;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>
@endsection