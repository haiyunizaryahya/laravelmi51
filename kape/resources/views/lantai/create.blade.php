@extends('layouts.main')
@section('content')
<form action="{{ route('lantai.store')}}" method="post">
{{-- untuk kemamana halamn web --}}
    @csrf

<h4>Tambah  Lokasi</h4>
<label for="nama_lantai">Nama Lokasi</label>
<input class="form-control" type="text"name="nama_lantai" id="" value="{{old("nama")}}">
{{-- memberi pesan  --}}
@error('nama_lantai')
{{$message}}
    
@enderror
<button class="btn btn-primary btn-rounded" type="submit">Simpan</button><br>
</form>
@endsection