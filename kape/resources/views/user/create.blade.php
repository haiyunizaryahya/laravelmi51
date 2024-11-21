@extends('layouts.main')
@section('content')

<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
    {{-- untuk keamanan halaman web --}}
    @csrf
    <h4>Tambah User</h4>

    Nama User
    <input class="form-control" type="text" name="name" id="" value="{{ old('name') }}"><br>
    {{-- memberi pesan --}}
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    Email
    <input class="form-control" type="text" name="email" id="" value="{{ old('email') }}"><br>
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    Password
    <input class="form-control" type="password" name="password" id="" value="{{ old('password') }}"><br>
    @error('password')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    Role
    <select name="role" id="" class="form-control">
        <option value="a">a</option>
        <option value="s">s</option>
        <option value="u">u</option>
    </select>
    @error('role')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    Foto
    <input class="form-control" type="file" name="poto" accept="image/*"><br>
    @error('poto')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <button class="btn btn-primary btn-rounded" type="submit">Simpan</button><br>
</form>
@endsection
