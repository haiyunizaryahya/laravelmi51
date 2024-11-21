@extends('layouts.main')
@section('content')

<div class="container">
    <h1>Edit Lokasi</h1>
    <form action="{{ route('lokasi.update', $lokasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $lokasi->kategori }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Lokasi</label>
            <input type="text" name="nama_lokasi" class="form-control" value="{{ $lokasi->nama_lokasi }}" required>
        </div>
        <div class="mb-3">
            <label>Lantai</label>
            <select name="lantai_id" class="form-control" required>
                @foreach ($lantais as $lantai)
                    <option value="{{ $lantai->id }}" {{ $lantai->id == $lokasi->lantai_id ? 'selected' : '' }}>
                        {{ $lantai->nama_lantai }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection