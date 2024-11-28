@extends('layouts.main')

@section('content')

<h1>Daftar Laporan Perawatan</h1>

<!-- Tambahkan tombol untuk Tambah Data -->
<div class="mb-3">
    <a href="{{ route('laporan.create') }}" class="btn btn-primary">Tambah Laporan Perawatan</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Lokasi</th>
            <th>Nama Petugas</th>
            <th>Detail Laporan </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporans as $laporan)
        <tr>
            <td>{{ $laporan->tanggal }}</td>
            <td>{{ $laporan->lokasi->nama_lokasi ?? 'Tidak Ada' }}</td>
            <td>{{ $laporan->user->name ?? 'Tidak Ada' }}</td>
            <td>
                <!-- Tombol Lihat Detail -->
                <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info">Lihat Detail</a>
                
                <!-- Tombol Ubah -->
                <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning">Ubah</a>
                
                <!-- Tombol Hapus dengan Form -->
                <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus laporan ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
