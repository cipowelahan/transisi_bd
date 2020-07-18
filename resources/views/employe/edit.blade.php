@extends('layout-admin')

@section('content')
<h3>Edit Data Employe</h3>

@error('update')
<div class="alert alert-danger">{{$message}}</div>
@enderror

<form action="{{route('employees.update', $employe->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nama</label>
        <input class="form-control" type="text" name="nama" autocomplete="off" value="{{$employe->nama}}">
        @error('nama')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="text" name="email" autocomplete="off" value="{{$employe->email}}">
        @error('email')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Company</label>
        <select class="form-control" name="company_id">
            @foreach($companies as $company)
            <option value="{{$company->id}}" @if($company->id == $employe->company_id) selected @endif >{{$company->nama}}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-default" type="button"><a href="{{route('employees.show', $employe->id)}}">Batalkan</a></button>
    <button class="btn btn-warning" type="submit">Ubah</button>
</form>
@endsection