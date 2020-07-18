@extends('layout-admin')

@section('content')
<h3>Edit Data Company</h3>

@error('update')
<div class="alert alert-danger">{{$message}}</div>
@enderror

<form action="{{route('companies.update', $company->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nama</label>
        <input class="form-control" type="text" name="nama" autocomplete="off" value="{{$company->nama}}">
        @error('nama')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="text" name="email" autocomplete="off" value="{{$company->email}}">
        @error('email')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Logo</label>
        <input class="form-control-file" type="file" name="logo" accept="image/*">
        <small class="form-text text-muted">* Upload ulang jika ingin mengubah</small>
        <small class="form-text text-muted">* Gambar .png minimal 100x100 px dan tidak lebih dari 2MB</small>
        @error('logo')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Website</label>
        <input class="form-control" type="text" name="website" autocomplete="off" value="{{$company->website}}">
        @error('website')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <button class="btn btn-default" type="button"><a href="{{route('companies.show', $company->id)}}">Batalkan</a></button>
    <button class="btn btn-warning" type="submit">Ubah</button>
</form>
@endsection