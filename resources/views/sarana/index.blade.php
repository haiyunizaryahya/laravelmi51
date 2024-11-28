@extends('layouts.main')
@section('content')
<h4>Sarana</h4>
<a href="{{route('sarana.create')}}" class="btn btn-primary">Tambah</a>

<table class="table table-hover">
    <tr>
        <th>Nama Sarana</th>  
        <th>Kategori Sarana</th>
    </tr>
 
    @foreach ($sarana as $item)
    <tr>
        <td>{{$item["nama_sarana"]}}<br></td>
        <td>{{$item["kategori"]}}<br></td>
        <td>
            <a href="{{route('sarana.edit', $item['id'])}}" class="btn btn-warning"> Edit </a>
             <form action="{{route('sarana.destroy', $item ['id'])}}" method="post" style="display: inline">
             @csrf
             @method ('DELETE')
             <button type="submit" class="btn btn-danger">Hapus</button>
             </form>   

        </td>
    </tr>
    @endforeach
</table>
@endsection
    
