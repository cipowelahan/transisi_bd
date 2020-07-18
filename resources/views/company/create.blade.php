@extends('layout-admin')

@section('content')
<h3>Tambah Data Company</h3>
<form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Nama</label>
        <input class="form-control" type="text" name="nama" autocomplete="off" value="{{old('nama')}}">
        @error('nama')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="text" name="email" autocomplete="off" value="{{old('email')}}">
        @error('email')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Logo</label>
        <input class="form-control-file" type="file" name="logo" accept="image/*">
        <small class="form-text text-muted">* Gambar .png minimal 100x100 px dan tidak lebih dari 2MB</small>
        @error('logo')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Website</label>
        <input class="form-control" type="text" name="website" autocomplete="off" value="{{old('website')}}">
        @error('website')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <button class="btn btn-success" type="submit">Tambah</button>
</form>
@endsection