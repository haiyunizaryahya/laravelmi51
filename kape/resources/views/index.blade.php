
@extends('main')
@section('content')
<h4>User</h4>
<a href="{{route('user.create')}}" class="btn btn-primary">Tambah</a>
<<table class="table" id="datatablesSimple">
    <thead>
    <tr>
        <th>Nama user  </th>
        <th>Email </th>
        <th>Password </th>
        <th>Role </th>
        <th>Aksi</th>


        <th>
    </tr>
    </thead>
    @foreach ($data_user as $item)
    <tr>
        <td> {{$item["name"]}} </td>
        <td>{{$item["email"]}}</td>
        <td>{{$item["password"]}}</td>
        <td>{{$item["role"]}}</td>
        <td>
            <a href="{{route('user.edit', $item['id'])}}" class="btn btn-warning"> Edit </a>
             <form action="{{route('user.destroy', $item ['id'])}}" method="post" style="display: inline">
             @csrf
             @method ('DELETE')
             <button type="submit" class="btn btn-danger">Hapus</button>
             </form>   
        </td>
    </tr>
    @endforeach
</table>
@endsection


    