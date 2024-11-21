@extends('layouts.main')
@section('content')
<h1>Ubah User</h1>
<form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
    {{-- untuk keamanan halaman web --}}
    @csrf
    @method('PUT')

    <h4>Edit User</h4>

    Nama User
    <input class="form-control" type="text" name="name" value="{{ old('name') ? old('name') : $user->name }}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    Email
    <input class="form-control" type="text" name="email" value="{{ old('email') ? old('email') : $user->email }}">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    Password
    <input class="form-control" type="password" name="password" placeholder="Isi jika ingin mengubah password">
    @error('password')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    Role
    <select name="role" id="" class="form-control">
        <option value="a" {{ $user->role == 'a' ? 'selected' : '' }}>a</option>
        <option value="s" {{ $user->role == 's' ? 'selected' : '' }}>s</option>
        <option value="u" {{ $user->role == 'u' ? 'selected' : '' }}>u</option>
    </select>
    @error('role')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    Foto
    <input class="form-control" type="file" name="poto" accept="image/*"><br>
    @error('poto')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    @if($user->poto)
        <div>
            <p>Foto Saat Ini:</p>
            <img src="{{ asset($user->poto) }}" alt="Foto User" style="width: 150px; height: 150px;">
        </div>
    @endif

    <button class="btn btn-primary btn-rounded" type="submit">Simpan</button><br>
</form>
@endsection
