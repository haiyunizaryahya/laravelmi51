@extends('main')
@section('content')
<form action="{{ route('lantai.update',$lantai->id)}}" method="post">
{{-- untuk kemamana halamn web --}}
    @csrf
    @method('PUT')

<h4>Edit Lokasi</h4>
<input class="form-control" type="text" name="nama" value="{{old("nama") ? old("nama"): $lantai->nama}}">
{{-- memberi pesan  --}}
@error('nama')
{{$message}}
    
@enderror
<button class="btn btn-primary btn-rounded" type="submit">Simpan</button><br>
</form>
@endsection