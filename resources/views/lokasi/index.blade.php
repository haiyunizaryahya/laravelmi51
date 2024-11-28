@extends('layouts.main')
@section('content')
<div class="container">
    <h1>Ruang</h1>
    <a class="btn btn-primary mb-3" href="{{ route('lokasi.create') }}">Tambah Lokasi</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Nama Ruang</th>
                <th>Lantai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lokasis as $lokasi)
                <tr>
                    <td>{{ $lokasi->kategori }}</td>
                    <td>{{ $lokasi->nama_lokasi }}</td>
                    <td>{{ $lokasi->lantai->nama_lantai }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('lokasi.edit', $lokasi) }}">Edit</a>
                        <form action="{{ route('lokasi.destroy', $lokasi) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #2196F3; /* Warna biru */
        color: rgb(226, 214, 214);
    }
</style>
@endsection