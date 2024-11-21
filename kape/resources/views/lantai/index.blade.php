@extends('layouts.main')
@section('content')
<h4>Lokasi</h4> 
<a href="{{route('lantai.create')}}" class="btn btn-primary">Tambah</a>
<table class="table" id="datatablesSimple">
    <thead>

        
        <tr>
            <th>Nama Lantai </th>
            <th>aksi</th>
        </tr>
    </thead>
        @foreach ($data_lantai as $item)
    <tr>
        <td>{{$item["nama_lantai"]}}<br></td>
        <td>
            <a href="{{route('lantai.edit', $item['id'])}}" class="btn btn-warning"> Edit </a>
             <form action="{{route('lantai.destroy', $item ['id'])}}" method="post" style="display: inline">
             @csrf
             @method ('DELETE')
             <button type="submit" class="btn btn-danger">Hapus</button>
             </form>   

        </td>
    </tr>
    @endforeach
</table>
@endsection

