@extends('layouts.main')

@section('content')

<h1>Detail Laporan Perawatan</h1>

<h2>Tanggal: {{ $laporan->tanggal }}</h2>
<h3>Lokasi: {{ $laporan->lokasi->nama_lokasi }}</h3>
<h3>Dilaporkan: {{ $laporan->user->name }}</h3>

<h3>Detail Perawatan:</h3>
<table class="table">
    <thead>
        <tr>
            <th>Nama Sarana</th>
            <th>Keterangan</th>
            <th>Foto Perawatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan->details as $detail)
        <tr>
            <td>{{ $detail->sarana->nama_sarana ?? 'Sarana tidak ditemukan' }}</td>
            <td>{{ $detail->keterangan }}</td>
            <td>
                @if($detail->upload_poto)
                    <img src="{{ asset('storage/' . $detail->upload_poto) }}" width="100" alt="Foto Perawatan">
                @else
                    <span>Tidak ada foto</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
