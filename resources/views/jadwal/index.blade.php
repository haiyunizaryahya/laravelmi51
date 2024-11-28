@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Jadwal</h1>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Staff</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Lokasi Tugas</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $item)
                <tr>
                    <td>{{ $item->jadwal_id }}</td>
                    <td>{{ $item->nama_staff }}</td>
                    <td>{{ $item->tanggal_awal }}</td>
                    <td>{{ $item->tanggal_akhir }}</td>
                    <td>
                        @foreach (json_decode($item->lokasi_tugas, true) as $lokasi)
                            <span class="badge bg-info text-dark">{{ $lokasi }}</span>
                        @endforeach
                    </td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('jadwal.edit', $item->jadwal_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('jadwal.destroy', $item->jadwal_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
