@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Tambah Jadwal</h1>
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_staff" class="form-label">Nama Staff</label>
            <select name="nama_staff" id="nama_staff" class="form-control" required>
                <option value="">Pilih Nama Staff</option>
                @foreach ($users as $id => $email)
                    <option value="{{ $email }}">{{ $email }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="lokasi_tugas" class="form-label">Lokasi Tugas</label>
            <select name="lokasi_tugas[]" id="lokasi_tugas" class="form-control" multiple required>
                @foreach ($lantai as $id => $nama_lantai)
                    <option value="{{ $nama_lantai }}">{{ $nama_lantai }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Gunakan CTRL (atau CMD di Mac) untuk memilih lebih dari satu lokasi.</small>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
