@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Edit Jadwal</h1>
    <form action="{{ route('jadwal.update', $jadwal->jadwal_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_staff" class="form-label">Nama Staff</label>
            <select name="nama_staff" id="nama_staff" class="form-control" required>
                <option value="">Pilih Nama Staff</option>
                @foreach ($users as $id => $email)
                    <option value="{{ $email }}" {{ $jadwal->nama_staff == $email ? 'selected' : '' }}>
                        {{ $email }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="{{ $jadwal->tanggal_awal }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="{{ $jadwal->tanggal_akhir }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi_tugas" class="form-label">Lokasi Tugas</label>
            <select name="lokasi_tugas[]" id="lokasi_tugas" class="form-control" multiple required>
                @foreach ($lantai as $id => $nama_lantai)
                    <option value="{{ $nama_lantai }}" 
                        @if (is_array($jadwal->lokasi_tugas) ? in_array($nama_lantai, $jadwal->lokasi_tugas) : in_array($nama_lantai, json_decode($jadwal->lokasi_tugas, true)))
                            selected 
                        @endif>
                        {{ $nama_lantai }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Gunakan CTRL (atau CMD di Mac) untuk memilih lebih dari satu lokasi.</small>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $jadwal->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
