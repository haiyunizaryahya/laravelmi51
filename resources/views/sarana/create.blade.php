@extends('layouts.main')
@section('content')
<form action="{{ route('sarana.store')}}" method="post">
{{-- untuk kemamana halamn web --}}
    @csrf

<h4>Tambah  Sarana</h4>
<label for="nama_sarana">Nama Sarana</label>
<input class="form-control" type="text"name="nama_sarana" id="" value="{{old("nama_sarana")}}">
{{-- memberi pesan  --}}
@error('nama_sarana')
{{$message}}   
@enderror
<label for="kategori">Kategori</label>
<input class="form-control" type="text"name="kategori" id="" value="{{old("kategori")}}">
{{-- memberi pesan  --}}
@error('kategori')
{{$message}}
@enderror
<button class="btn btn-primary btn-rounded" type="submit">Simpan</button><br>
</form>
@endsection