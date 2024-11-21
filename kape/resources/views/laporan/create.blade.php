@extends('layouts.main')

@section('content')

<h1>Tambah Laporan Perawatan</h1>

<form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
        @error('tanggal')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="lokasi_id" class="form-label">Lokasi</label>
        <select name="lokasi_id" class="form-control">
            <option value="">Pilih Lokasi</option>
            @foreach($lokasi as $lok)
                <option value="{{ $lok->id }}" {{ old('lokasi_id') == $lok->id ? 'selected' : '' }}>{{ $lok->nama_lokasi }}</option>
            @endforeach
        </select>
        @error('lokasi_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" class="form-control">
            <option value="">Pilih User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <hr>

    <h3>Detail Perawatan</h3>
    
    <div id="details">
        <div class="detail mb-3">
            <label for="sarana_id" class="form-label">Sarana</label>
            <select name="details[0][sarana_id]" class="form-control">
                <option value="">Pilih Sarana</option>
                @foreach($sarana as $item)
                    <option value="{{ $item->id }}" {{ old('details.0.sarana_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_sarana }}</option>
                @endforeach
            </select>
            @error('details.0.sarana_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="details[0][keterangan]" class="form-control" value="{{ old('details.0.keterangan') }}">
            @error('details.0.keterangan')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="upload_poto" class="form-label">Upload Foto</label>
            <input type="file" name="details[0][upload_poto]" class="form-control">
            @error('details.0.upload_poto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <button type="button" class="btn btn-secondary" onclick="addDetail()">Tambah Detail</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<script>
    let detailIndex = 1;

    function addDetail() {
        const detailsDiv = document.getElementById('details');
        const newDetail = document.createElement('div');
        newDetail.classList.add('detail', 'mb-3');
        newDetail.innerHTML = `
            <label for="sarana_id" class="form-label">Sarana</label>
            <select name="details[${detailIndex}][sarana_id]" class="form-control">
                <option value="">Pilih Sarana</option>
                @foreach($sarana as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_sarana }}</option>
                @endforeach
            </select>

            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="details[${detailIndex}][keterangan]" class="form-control">

            <label for="upload_poto" class="form-label">Upload Foto</label>
            <input type="file" name="details[${detailIndex}][upload_poto]" class="form-control">
        `;
        detailsDiv.appendChild(newDetail);
        detailIndex++;
    }
</script>

@endsection
