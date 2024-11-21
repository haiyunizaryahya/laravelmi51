@extends('layouts.main')

@section('content')

<h1>Edit Laporan Perawatan</h1>

<!-- Form untuk mengedit laporan perawatan -->
<form action="{{ route('laporan.update', $laporan->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $laporan->tanggal }}" required>
    </div>
    
    <div class="mb-3">
        <label for="lokasi_id" class="form-label">Lokasi</label>
        <select name="lokasi_id" id="lokasi_id" class="form-control" required>
            @foreach($lokasis as $lokasi)
                <option value="{{ $lokasi->id }}" {{ $laporan->lokasi_id == $lokasi->id ? 'selected' : '' }}>
                    {{ $lokasi->nama_lokasi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" id="user_id" class="form-control" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $laporan->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
</form>

@endsection
