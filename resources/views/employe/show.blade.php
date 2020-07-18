@extends('layout-admin')

@section('content')
<a href="{{route('employees.edit', $employe->id)}}">
    <button class="btn btn-warning">Edit Data</button>
</a>

<a href="{{route('employees.destroy', $employe->id)}}">
    <button class="btn btn-danger">Hapus Data</button>
</a>

<hr>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Nama</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$employe->nama}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Email</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$employe->email}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Company</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$employe->company->nama}}" readonly>
    </div>
</div>
@endsection