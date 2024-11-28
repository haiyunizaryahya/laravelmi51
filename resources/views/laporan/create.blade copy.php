@extends('layouts.main')

@section('content')

<h1>Tambah Laporan Perawatan</h1>

<form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="lokasi_id" class="form-label">Lokasi ID</label>
        <input type="number" name="lokasi_id" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="user_id" class="form-label">User ID</label>
        <input type="number" name="user_id" class="form-control" required>
    </div>

    <hr>

    <h3>Detail Perawatan</h3>
    
    <div id="details">
        <div class="detail mb-3">
            <label for="sarana_id" class="form-label">Sarana ID</label>
            <input type="number" name="details[0][sarana_id]" class="form-control" required>
            
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="details[0][keterangan]" class="form-control" required>
            
            <label for="upload_poto" class="form-label">Upload Foto</label>
            <input type="file" name="details[0][upload_poto]" class="form-control" required>
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
            <label for="sarana_id" class="form-label">Sarana ID</label>
            <input type="number" name="details[${detailIndex}][sarana_id]" class="form-control" required>

            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="details[${detailIndex}][keterangan]" class="form-control" required>

            <label for="upload_poto" class="form-label">Upload Foto</label>
            <input type="file" name="details[${detailIndex}][upload_poto]" class="form-control" required>
        `;
        detailsDiv.appendChild(newDetail);
        detailIndex++;
    }
</script>

@endsection
